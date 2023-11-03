@extends('layouts.layout')

@section('konten')
    <h5 class="fw-bold my-3">
        Tambah Admin
    </h5>
    <form action="{{ url('user') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpname"
                placeholder="Nama Lengkap">
            <small id="helpname" class="form-text text-muted">Masukkan Nama Lengkap</small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpemail"
                placeholder="Email">
            <small id="helpemail" class="form-text text-muted">Masukkan Email</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="helppassword"
                placeholder="****">
            <small id="helppassword" class="form-text text-muted">Masukkan Password</small>
        </div>
        <div class="d-inline-flex">
            <a href="{{ url('user') }}" class="btn btn-danger me-2">
                < Kembali </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
