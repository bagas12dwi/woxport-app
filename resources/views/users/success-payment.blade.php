@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <div class="col-12 text-center d-flex align-items-center justify-content-center">
            <div>
                <img class="img-fluid w-50" src="{{ URL::asset('/assets/images/waiting.svg') }}" alt="404 not found">
                <h1 class="mt-5">Transaksi <span class="fw-bolder text-primary">Sedang Diproses!</span></h1>
                <p class="lead my-4">Mohon tunggu, Transaksi anda sedang diproses oleh vendor!</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Kembali Ke Halaman Utama</a>
            </div>
        </div>
    </div>
@endsection
