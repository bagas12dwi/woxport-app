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
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, quam maiores sequi quas
                            consequatur consequuntur voluptas magni corporis illo sapiente.</p>
                        <hr>
                        <div class="card bg-white border-0">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{ URL::asset('assets/images/rec-1.jpg') }}" class="rounded" alt=""
                                        style="width: 200px; object-fit: cover">
                                    <div class="d-flex flex-column ms-2">
                                        <h5 class="card-title fw-bold">Glamour Wedding</h5>
                                        <p class="card-text">Rp. 100.000</p>
                                    </div>
                                </div>
                            </div>
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
                        <div class="d-flex justify-content-between">
                            <h6 class="text-muted">Harga Barang (1 Barang)</h6>
                            <h6 class="text-muted">Rp. 100.000</h6>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="fw-bold">Total Harga</h6>
                            <h6 class="fw-bold">Rp. 100.000</h6>
                        </div>
                        <hr>
                        <h6 class="fw-bold">Pembayaran</h6>
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-wallet fs-4"></i>
                                    <h6 class="ms-3">0930239023 <br>(BCA) </h6>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
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
                <form action="">
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="file" id="file"
                            placeholder="Upload Bukti Pembayaran" aria-describedby="fileHelpId">
                        <div id="fileHelpId" class="form-text">Upload Bukti Pembayaran</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
