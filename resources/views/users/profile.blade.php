@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Profil <span class="text-dark">Ku </span></h1>
        <div class="card bg-white border-0 shadow p-4">
            <form action="{{ url('/profile/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    @if (auth()->user()->img_path != null)
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ URL::asset('/storage/' . auth()->user()->img_path) }}"
                                class="rounded-circle profile" alt="foto profil"
                                style="width: 200px; height: 200px; object-fit: cover">
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ URL::asset('/assets/images/profil.jpg') }}" class="rounded-circle profile"
                                alt="foto profil" style="width: 200px; height: 200px; object-fit: cover">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="img_path" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" name="img_path" id="img_path"
                        placeholder="upload foto profile" aria-describedby="fileHelpProfile">
                    <div id="fileHelpProfile" class="form-text">Upload Foto Profil (.JPG / .PNG)</div>
                </div>
                <input type="hidden" name="odlImg" value="{{ $user->img_path }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap"
                        value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="No. Telepon"
                        value="{{ $user->phone }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $user->address }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
