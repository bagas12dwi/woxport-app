<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $vendor = Vendor::where('user_id', auth()->user()->id)->first();
        $product = Product::with('imageProduct')->where('vendor_id', '=', $vendor->id)->orderBy('created_at', 'Desc')->limit(3)->get();
        $paymentConfirm = Payment::where('vendor_id', $vendor->id)->where('status', 'Menunggu Konfirmasi')->get();
        $payment = Payment::where('vendor_id', $vendor->id)->where('status', '!=', 'Menunggu Konfirmasi')->where('status', '!=', 'Belum Dibayar')->get();
        $paymentSuccess = Payment::where('vendor_id', $vendor->id)->where('status',  'Disetujui')->get();
        $totalPrice = $paymentSuccess->sum('total_price');
        return view('vendor.toko.index', [
            'title' => 'Toko',
            'products' => $product,
            'jmlProduk' => count($product),
            'paymentConfirm' => count($paymentConfirm),
            'payment' => count($payment),
            'paymentSuccess' => $totalPrice,
            'vendor' => $vendor
        ]);
    }

    public function edit()
    {
        $vendor = Vendor::where('user_id', auth()->user()->id)->first();
        $bank = BankAccount::all();
        return view('vendor.toko.edit', [
            'title' => 'Edit Toko',
            'banks' => $bank,
            'vendor' => $vendor
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_name' => 'required',
            'address' => 'required',
            'bank_account_id' => 'required',
            'bank_account_number' => 'required',
        ]);

        Vendor::where('id', $request->id)->update($validatedData);
        return redirect()->intended('/vendor/toko');
    }
}
