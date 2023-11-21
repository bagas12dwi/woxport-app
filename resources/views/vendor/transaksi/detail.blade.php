@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Detail <span class="text-dark">Transaksi</span></h1>
        <a href="{{ url('/vendor/transaksi') }}" class="btn btn-primary mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <div class="row g-3">
            <div class="col-md-8 col-sm-6">
                <div class="card shadow border-0 bg-white p-3">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            Alamat
                        </h5>
                        <hr>
                        @if ($payment->status == 'Belum Dibayar')
                            @if (auth()->user()->address == null)
                                <a href="{{ url('/profile') }}" class="btn btn-primary btn-sm">Tambahkan Alamat</a>
                            @else
                                <p>{{ auth()->user()->address }}</p>
                                <a href="{{ url('/profile') }}" class="btn btn-primary btn-sm">Edit Alamat</a>
                            @endif
                        @else
                            <p>{{ auth()->user()->address }}</p>
                        @endif
                        <hr>
                        <div class="card bg-white border-0">
                            @foreach ($payment->paymentDetail as $paymentDetail)
                                <div class="card-body">
                                    <div class="d-flex">
                                        @if (count($paymentDetail->product->imageProduct) > 0)
                                            <img src="{{ URL::asset('storage/' . $paymentDetail->product->imageProduct[0]->img_path) }}"
                                                class="card-img-top" alt="Image"
                                                style="width: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top"
                                                alt="Image" style="width: 200px; object-fit: cover;">
                                        @endif
                                        <div class="d-flex flex-column ms-2">
                                            <h5 class="card-title fw-bold">{{ $paymentDetail->product->product_name }}
                                            </h5>
                                            <p class="card-text">@currency($paymentDetail->product->price)</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card bg-white shadow border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            @if ($payment->status == 'Belum Dibayar')
                                <span class="badge text-bg-info fs-6 mb-3">{{ $payment->status }}</span>
                            @elseif ($payment->status == 'Menunggu Konfirmasi')
                                <span class="badge text-bg-warning fs-6 mb-3">{{ $payment->status }}</span>
                            @elseif ($payment->status == 'Disetujui')
                                <span class="badge text-bg-success fs-6 mb-3">{{ $payment->status }}</span>
                            @elseif ($payment->status == 'Gagal')
                                <span class="badge text-bg-danger fs-6 mb-3">{{ $payment->status }}</span>
                            @endif
                            @if ($payment->status == 'Menunggu Konfirmasi')
                                <form action="{{ url('/vendor/transaksi/konfirmasi/setuju') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $payment->id }}">
                                    <button class="btn btn-success">
                                        Konfirmasi
                                    </button>
                                </form>
                                <form action="{{ url('/vendor/transaksi/konfirmasi/tolak') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $payment->id }}">
                                    <button class="btn btn-danger">
                                        Tolak
                                    </button>
                                </form>
                            @endif
                        </div>
                        <h5 class="card-title fw-bold mb-3">
                            Ringkasan Pesanan
                        </h5>
                        <p class="fw-bold">No. Pembayaran : {{ $payment->order_number }}</p>
                        @foreach ($payment->paymentDetail as $paymentDetail)
                            <div class="d-flex justify-content-between">
                                <h6 class="text-muted">{{ $paymentDetail->product->product_name }}
                                    ({{ $paymentDetail->qty }} Barang)
                                </h6>
                                <h6 class="text-muted">@currency($paymentDetail->price)</h6>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="fw-bold">Total Harga</h6>
                            <h6 class="fw-bold">@currency($payment->total_price)</h6>
                        </div>
                        <hr>
                        <h6 class="fw-bold">Pembayaran</h6>
                        <button type="button" class="btn btn-primary w-full" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-file-earmark-image"></i> Lihat Bukti Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Modal -->
<div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="{{ URL::asset('/storage/' . $payment->proof_of_payment) }}" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
