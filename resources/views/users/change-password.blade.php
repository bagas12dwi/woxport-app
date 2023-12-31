@extends('layouts.app')

@section('konten')
    <div class="container my-5">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Ubah <span class="text-dark">Password </span></h1>
        <div class="card border-0 shadow bg-white p-4">
            <form action="{{ url('change-password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" name="password" id="password"
                        aria-describedby="passwordhelp" placeholder="*****">
                    <small id="passwordhelp" class="form-text text-muted">masukkan password baru</small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
