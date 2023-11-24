@extends('layouts.app')

@section('konten')
    <div class="container my-4">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Tambah <span class="text-dark">{{ $title }}
            </span>
        </h1>
        <form action="{{ url('vendor/produk') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="product_name" id="product_name"
                    aria-describedby="helpproduct_name" placeholder="Nama Produk">
                <small id="helpproduct_name" class="form-text text-muted">Masukkan Nama Produk</small>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select form-select" name="category_id" id="category_id">
                    <option selected>-Pilih Kategori-</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" name="price" id="price" aria-describedby="helpprice"
                    placeholder="Harga">
                <small id="helpprice" class="form-text text-muted">Masukkan Harga</small>
            </div>
            <div class="mb-3">
                <label for="promotion_price" class="form-label">Harga Promosi</label>
                <input type="number" class="form-control" name="promotion_price" id="promotion_price"
                    aria-describedby="helppromotion_price" placeholder="Harga" value="0">
                <small id="helppromotion_price" class="form-text text-muted">Masukkan Harga</small>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Pilih Gambar</label>
                <input type="file" class="form-control" name="img_path[]" id="img_path" placeholder="Pilih Gambar"
                    aria-describedby="fileHelpId" multiple>
                <div id="fileHelpId" class="form-text">Pilih Gambar .JPG / .PNG</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <div class="d-flex">
                <a href="{{ url('vendor/produk') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i>
                    Kembali
                </a>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
