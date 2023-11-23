<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Cart;
use App\Models\Notification;
use App\Models\PaymentDetail;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($orderNumber)
    {
        $payment = Payment::with('paymentDetail')->where('order_number', $orderNumber)->first();
        return view('users.confirm-payment', [
            'title' => 'Pembayaran',
            'payment' => $payment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $cartIds = request()->input('cart_ids');

        // Calculate total price based on the selected carts
        $totalPrice = 0;
        $vendorId = 0;
        foreach ($cartIds as $cartId) {
            $cart = Cart::findOrFail($cartId);
            $totalPrice += $cart->product->price * $cart->qty;
            $vendorId = $cart->vendor_id;
        }

        // Generate a unique order number (you may want to use a more sophisticated logic)
        $orderNumber = 'ORD' . time();

        // Create a new payment record
        $payment = Payment::create([
            'order_number' => $orderNumber,
            'vendor_id' => $vendorId,
            'total_price' => $totalPrice,
            'user_id' => auth()->user()->id,
            'status' => 'Belum Dibayar'
        ]);

        // Create payment details for each selected cart
        foreach ($cartIds as $cartId) {
            $cart = Cart::findOrFail($cartId);

            PaymentDetail::create([
                'payment_id' => $payment->id,
                'product_id' => $cart->product->id,
                'qty' => $cart->qty,
                'price' => $cart->product->price,
            ]);

            Cart::destroy($cart->id);

            // Optionally, you can update the status of the carts or perform other actions here
        }

        Notification::create([
            'title' => 'Pembayaran',
            'content' => 'Pembayaran anda dengan No. Order : <b>' . $payment->order_number . '</b> belum dibayar',
            'url' => "/daftar-transaksi/detail/$payment->order_number",
            'user_id' => auth()->user()->id
        ]);

        return response()->json(['success' => true, 'order_number' => $payment->order_number]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $orderNumber)
    {
        $validatedData = $request->validate([
            'proof_of_payment' => 'required | image'
        ]);

        $validatedData['proof_of_payment'] = $request->file('proof_of_payment')->store('bukti-bayar');
        $validatedData['address'] = auth()->user()->address;
        $validatedData['status'] = "Menunggu Konfirmasi";

        try {
            $vendor = Payment::where('order_number', $orderNumber)->first();
            $user = User::where('id', $vendor->user_id)->first();

            Payment::where('order_number', $orderNumber)->update($validatedData);
            Notification::create([
                'title' => 'Pembayaran',
                'content' => 'Pembayaran anda dengan No. Order : <b>' . $orderNumber . '</b> sedang menunggu konfirmasi vendor',
                'url' => "/daftar-transaksi/detail/$orderNumber",
                'user_id' => auth()->user()->id
            ]);

            Notification::create([
                'title' => 'Pemesanan',
                'content' => 'Pemesanan dengan No. Order : <b>' . $orderNumber . '</b> menunggu konfirmasi vendor',
                'url' => "/vendor/transaksi/detail/$orderNumber",
                'user_id' => $user->id
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }


        return redirect()->intended('/success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
