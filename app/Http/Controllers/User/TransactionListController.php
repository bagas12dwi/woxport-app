<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class TransactionListController extends Controller
{
    public function index()
    {
        $payment = Payment::with('vendor')->where('user_id', auth()->user()->id)->orderBy('created_at', 'Desc')->get();
        return view('users.transaction-list', [
            'title' => 'Daftar Transaksi',
            'payments' => $payment
        ]);
    }

    public function detail($orderNumber)
    {
        $payment = Payment::with('paymentDetail')->where('order_number', $orderNumber)->first();
        return view('users.transaction-detail', [
            'title' => 'Transaksi Detail',
            'payment' => $payment
        ]);
    }
}
