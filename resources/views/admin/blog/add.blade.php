@extends('layouts.layout')

@section('konten')
    <h5 class="fw-bold my-3">
        Tambah {{ $title }}
    </h5>
    <form action="{{ url('manage-blog') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helptitle"
                placeholder="Judul">
            <small id="helptitle" class="form-text text-muted">Masukkan Judul</small>
        </div>
        <div class="mb-3">
            <label for="img_path" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Pilih Gambar"
                aria-describedby="fileHelpId">
            <div id="fileHelpId" class="form-text">Upload gambar (JPG/PNG)</div>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Isi</label>
            <input id="body" type="hidden" name="body">
            <trix-editor class="trix-content" input="body"></trix-editor>
        </div>
        <div class="d-inline-flex">
            <a href="{{ url('manage-blog') }}" class="btn btn-danger me-2">
                < Kembali </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
