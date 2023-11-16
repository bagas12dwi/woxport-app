@extends('layouts.layout')

@section('konten')
    <h5 class="fw-bold my-3">
        Ubah {{ $title }}
    </h5>
    <form action="{{ url('manage-bank/' . $bank->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="bank_name" class="form-label">Nama Bank</label>
            <input type="text" class="form-control" name="bank_name" id="bank_name" aria-describedby="helpbank_name"
                value="{{ $bank->bank_name }}" placeholder="Nama Bank">
            <small id="helpbank_name" class="form-text text-muted">Masukkan Nama Bank</small>
        </div>
        <div class="d-inline-flex">
            <a href="{{ url('manage-bank') }}" class="btn btn-danger me-2">
                < Kembali </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
