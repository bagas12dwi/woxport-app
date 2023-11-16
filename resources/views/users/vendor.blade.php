@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Our <span class="text-dark">Vendor</span>
        </h1>
        <div class="row g-4">
            @if (count($vendor) > 0)
                @foreach ($vendor as $vendor)
                    <div class="col-md-4 col-sm-12">
                        <div class="card bg-white shadow border-0 card-product">
                            @if (count($vendor->imageProduct) > 0)
                                <img src="{{ URL::asset('storage/' . $vendor->imageProduct[0]->img_path) }}"
                                    class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                                    style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <div
                                    class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">
                                    <form action="{{ url('/cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="product_id" value="{{ $vendor->id }}">
                                        <button type="submit" class="btn btn-primary mb-2">Add to
                                            Cart</button>
                                    </form>
                                    <a href="{{ url('vendor/detail/' . $vendor->id) }}" class="btn btn-light">Show
                                        Details</a>
                                </div>
                                <h5 class="card-title fw-bold text-primary text-center">@currency($vendor->price)
                                    <span class="text-decoration-line-through fs-6 text-dark">Rp.
                                        @currency($vendor->price + 100000)
                                    </span>
                                </h5>
                                <p class="card-text text-center">{{ $vendor->product_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div>
                        <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                        <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">produk!</span></h1>
                        <p class="lead my-4">Belum ada produk yang ditambahkan</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
