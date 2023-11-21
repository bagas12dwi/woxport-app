@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Daftar <span class="text-dark">Transaksi</span></h1>
        <a href="{{ url('/vendor/toko') }}" class="btn btn-primary mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        @if (count($payments) > 0)
            @foreach ($payments as $payment)
                <a href="{{ url('/vendor/transaksi/detail/' . $payment->order_number) }}"
                    class="text-decoration-none card shadow border-0 mb-3 bg-white">
                    <div class="card-title d-flex justify-content-between p-4 align-items-center mb-0">
                        <div class="fw-bold fs-4">{{ $payment->order_number }}</div>
                        @if ($payment->status == 'Belum Dibayar')
                            <span class="badge text-bg-info fs-6">{{ $payment->status }}</span>
                        @elseif ($payment->status == 'Menunggu Konfirmasi')
                            <span class="badge text-bg-warning fs-6">{{ $payment->status }}</span>
                        @elseif ($payment->status == 'Disetujui')
                            <span class="badge text-bg-success fs-6">{{ $payment->status }}</span>
                        @elseif ($payment->status == 'Gagal')
                            <span class="badge text-bg-danger fs-6">{{ $payment->status }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="fs-5">Nama Pembeli : {{ $payment->user->name }} </div>
                        <div class="fs-5">Harga : @currency($payment->total_price)</div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div>
                    <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                    <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">transaksi!</span></h1>
                    <p class="lead my-4">Belum ada transaksi yang dibuat</p>
                </div>
            </div>
        @endif
    </div>
@endsection
