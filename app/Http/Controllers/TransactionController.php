<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Payment;
use App\Models\Vendor;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $vendor = Vendor::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $payment = Payment::with('paymentDetail')
            ->where('vendor_id', $vendor->id)
            ->where('status', '!=', 'Belum Dibayar')
            ->where('status', '!=', 'Menunggu Konfirmasi')
            ->get();

        return view('vendor.transaksi.index', [
            'title' => 'Transaksi',
            'payments' => $payment
        ]);
    }

    public function indexConfirmTransaction()
    {
        $vendor = Vendor::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $payment = Payment::with('paymentDetail')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'Menunggu Konfirmasi')
            ->get();

        return view('vendor.transaksi.index', [
            'title' => 'Transaksi',
            'payments' => $payment
        ]);
    }

    public function detail($orderNumber)
    {
        $payment = Payment::with('paymentDetail')->where('order_number', $orderNumber)->first();
        return view('vendor.transaksi.detail', [
            'title' => 'Transaksi Detail',
            'payment' => $payment
        ]);
    }

    public function konfirmasi(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required'
        ]);

        $payment = Payment::where('id', $validatedData['id'])->first();

        Payment::where('id', $validatedData['id'])->update([
            'status' => 'Disetujui'
        ]);

        Notification::create([
            'title' => 'Pembayaran',
            'content' => 'Pembayaran anda dengan No. Order : <b>' . $payment->order_number . '</b> telah disetujui',
            'url' => "/daftar-transaksi/detail/$payment->order_number",
            'user_id' => $payment->user_id
        ]);

        return redirect()->intended('/vendor/toko');
    }

    public function tolak(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required'
        ]);

        $payment = Payment::where('id', $validatedData['id'])->first();

        Payment::where('id', $validatedData['id'])->update([
            'status' => 'Gagal'
        ]);

        Notification::create([
            'title' => 'Pembayaran',
            'content' => 'Pembayaran anda dengan No. Order : <b>' . $payment->order_number . '</b> telah ditolak',
            'url' => "/daftar-transaksi/detail/$payment->order_number",
            'user_id' => $payment->user_id
        ]);

        return redirect()->intended('/vendor/toko');
    }
}
