@extends('layouts.layout')

@section('konten')
    <h5 class="fw-bold my-3">
        Tambah {{ $title }}
    </h5>
    <form action="{{ url('kategori') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category_name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="category_name" id="category_name"
                aria-describedby="helpCategory_name" placeholder="Nama Kategori">
            <small id="helpCategory_name" class="form-text text-muted">Masukkan Nama Kategori</small>
        </div>
        <div class="mb-3">
            <label for="img_path" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Pilih Gambar"
                aria-describedby="fileHelpId">
            <div id="fileHelpId" class="form-text">Upload gambar (JPG/PNG)</div>
        </div>
        <div class="d-inline-flex">
            <a href="{{ url('kategori') }}" class="btn btn-danger me-2">
                < Kembali </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
