@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Checkout</h1>
        <div class="row g-3">
            <div class="col-md-8 col-sm-6">
                <div class="card shadow border-0 bg-white p-3">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            Alamat
                        </h5>
                        <hr>
                        @if (auth()->user()->address == null)
                            <a href="{{ url('/profile') }}" class="btn btn-primary btn-sm">Tambahkan Alamat</a>
                        @else
                            <p>{{ auth()->user()->address }}</p>
                            <a href="{{ url('/profile') }}" class="btn btn-primary btn-sm">Edit Alamat</a>
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
                                            <p class="card-text">@currency($paymentDetail->price)</p>
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
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shop fs-4"></i>
                                    <h6 class="fw-bold ms-3"> {{ $payment->vendor->vendor_name }}
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-wallet fs-4"></i>
                                    <h6 class="ms-3">{{ $payment->vendor->bank_account_number }}
                                        <br>({{ $payment->vendor->bankAccount->bank_name }})
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" {{ auth()->user()->address == null ? 'disabled' : '' }}>
                            Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/payment/' . $payment->order_number) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="proof_of_payment" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="proof_of_payment" id="proof_of_payment"
                            placeholder="Upload Bukti Pembayaran" aria-describedby="proof_of_paymentHelpId">
                        <div id="proof_of_paymentHelpId" class="form-text">Upload Bukti Pembayaran</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
