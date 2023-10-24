@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Our <span class="text-dark">Wedding</span> Vendor
        </h1>
        <div class="row g-4">
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary mb-2">Add To Cart</a>
                            <a href="{{ url('vendor/detail') }}" class="btn btn-light">Show Details</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Rp. 100.000 <span
                                class="text-decoration-line-through fs-6 text-dark">Rp. 200.000</span></h5>
                        <p class="card-text text-center">Glamour Wedding</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary mb-2">Add To Cart</a>
                            <a href="{{ url('vendor/detail') }}" class="btn btn-light">Show Details</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Rp. 100.000 <span
                                class="text-decoration-line-through fs-6 text-dark">Rp. 200.000</span></h5>
                        <p class="card-text text-center">Glamour Wedding</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-white shadow border-0 card-product">
                    <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div
                            class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                            <a href="#" class="btn btn-primary mb-2">Add To Cart</a>
                            <a href="{{ url('vendor/detail') }}" class="btn btn-light">Show Details</a>
                        </div>
                        <h5 class="card-title fw-bold text-primary text-center">Rp. 100.000 <span
                                class="text-decoration-line-through fs-6 text-dark">Rp. 200.000</span></h5>
                        <p class="card-text text-center">Glamour Wedding</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
