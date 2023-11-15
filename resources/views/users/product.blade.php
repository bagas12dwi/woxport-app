@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Our <span class="text-dark">Product </span></h1>
        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-12">
                    <div class="card bg-white shadow border-0 card-product">
                        <img src="{{ URL::asset('/storage/' . $category->img_path) }}" class="card-img-top" alt="Image"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <div
                                class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                                <a href="{{ url('/list_vendor/' . $category->id) }}" class="btn btn-primary">Cari Vendor</a>
                            </div>
                            <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                            <p class="card-text text-center">{{ $category->category_name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
