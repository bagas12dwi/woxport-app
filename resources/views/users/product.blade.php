@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Our <span class="text-dark">Product </span></h1>
        <div class="row g-4">
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary">Cari Vendor</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                        <p class="card-text text-center">Wedding Organizer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/muaaa.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary">Cari Vendor</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                        <p class="card-text text-center">MUA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/potograpi.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary">Cari Vendor</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                        <p class="card-text text-center">Fotografer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/ctr-1.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary">Cari Vendor</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                        <p class="card-text text-center">Catering</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/wardrobe.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary">Cari Vendor</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                        <p class="card-text text-center">Wardrobe</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/decor-1.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary">Cari Vendor</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Special</h5>
                        <p class="card-text text-center">Decoration and Lighting</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
