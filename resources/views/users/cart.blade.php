@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">My <span class="text-dark">Cart </span></h1>
        <div class="row g-2">
            <div class="col-md-8 col-sm-6">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="form-check fs-4 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="0" id="checkCart">
                            </div>
                            <img src="{{ URL::asset('assets/images/rec-1.jpg') }}" class="rounded" alt=""
                                style="width: 200px; object-fit: cover">
                            <div class="d-flex flex-column ms-2">
                                <h5 class="card-title fw-bold">Glamour Wedding</h5>
                                <p class="card-text">Rp. 100.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 align-items-center">
                        <form action="#" class="ms-auto me-2">
                            <button class="btn p-0">
                                <i class="bi bi-trash fs-3"></i>
                            </button>
                        </form>
                        <div class="mb-1">
                            <input type="number" class="form-control" name="qty" id="qty"
                                aria-describedby="helpqty" placeholder="0">
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
                        <a href="{{ url('payment') }}" class="btn btn-primary w-100">
                            Beli (1)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
