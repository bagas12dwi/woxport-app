@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Edit <span class="text-dark">Toko </span></h1>
        <a href="{{ url('/vendor/toko') }}" class="btn btn-primary mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <div class="card bg-white border-0 shadow p-4">
            <form action="{{ url('vendor/edit-toko') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="vendor_name" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Nama Toko"
                        value="{{ $vendor->vendor_name }}">
                </div>
                <input type="hidden" name="id" value="{{ $vendor->id }}">
                <div class="mb-3">
                    <label for="" class="form-label">Rekening</label>
                    <select class="form-select form-select-md" name="bank_account_id">
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}"
                                {{ $bank->id == $vendor->bank_account_id ? 'selected' : '' }}>{{ $bank->bank_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bank_account_number" class="form-label">No. Rekening</label>
                    <input type="number" class="form-control" name="bank_account_number" id="bank_account_number"
                        placeholder="No. Rekening" value="{{ $vendor->bank_account_number }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $vendor->address }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
