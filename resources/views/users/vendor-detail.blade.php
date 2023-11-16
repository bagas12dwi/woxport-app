@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($vendor->imageProduct as $image)
                            <div class="carousel-item active">
                                <img src="{{ URL::asset('storage/' . $image->img_path) }}" class="d-block w-100"
                                    style="object-fit: cover;" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="d-flex">
                    <h3 class="fw-bold">{{ $vendor->product_name }}</h3>
                    @if ($isInWishlist)
                        <form action="{{ url('/unlike/' . $wishlist_id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="product_id" value="{{ $vendor->id }}">
                            <button class="btn btn-primary ms-2"><i class="bi bi-heart-fill"></i></button>
                        </form>
                    @else
                        <form action="{{ url('/wishlist') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $vendor->id }}">
                            <button class="btn btn-primary ms-2"><i class="bi bi-heart"></i></button>
                        </form>
                    @endif
                </div>
                <hr>
                <h5 class="fw-bold text-primary">@currency($vendor->price) <span
                        class="text-decoration-line-through text-dark fs-6">Rp.
                        @currency($vendor->price + 100000)</span></h5>
                <div class="d-flex text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <p class="ms-2 text-dark">(5 Customer review)</p>
                </div>
                <hr>
                <p class="text-truncate">{{ $vendor->description }} </p>
                <form action="{{ url('/cart') }}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <div class="mb-3">
                            <input type="number" class="form-control" name="qty" id="qty"
                                aria-describedby="helpqty" placeholder="0" value="1">
                            <small id="helpqty" class="form-text text-muted">Masukkan Qty pesan</small>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $vendor->id }}">
                        <button type="submit" class="btn btn-primary ms-2"><i
                                class="bi bi-cart-plus-fill fs-4 me-2"></i>Add to
                            Cart</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container mt-5">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab"
                        aria-controls="tab1" aria-selected="true">Description</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                        aria-controls="tab2" aria-selected="false">Reviews (2)</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabsContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <h3 class="mt-3">{{ $vendor->product_name }}</h3>
                    <p>{{ $vendor->description }}</p>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <div class="d-flex my-3">
                        <h3 class="me-3">Review (2)</h3>
                        <button class="btn btn-primary">Leave a Review</button>
                    </div>
                    <div class="card mb-3 bg-light border-0 shadow p-2">
                        <div class="row g-0">
                            <div class="col-lg-1 col-md-2 d-flex align-items-center justify-content-center">
                                <img src="{{ URL::asset('assets/images/profil.jpg') }}" class="rounded-circle">
                            </div>
                            <div class="col-lg-11 col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">John Doe</h5>
                                    <div class="d-flex text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <p class="card-text"><small class="text-body-secondary">22 Agustus 2023</small></p>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Temporibus iste doloribus dolor? Mollitia, quod rem nihil veniam, veritatis odio
                                        quasi porro nulla cumque odit ut ab earum id recusandae? Necessitatibus modi
                                        exercitationem voluptas voluptatum ut aperiam id? Deleniti voluptatem enim numquam
                                        itaque tempore molestiae possimus assumenda repudiandae ipsam! Odit, nisi.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 bg-light border-0 shadow p-2">
                        <div class="row g-0">
                            <div class="col-lg-1 col-md-2 d-flex align-items-center justify-content-center">
                                <img src="{{ URL::asset('assets/images/profil.jpg') }}" class="rounded-circle">
                            </div>
                            <div class="col-lg-11 col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">John Doe</h5>
                                    <div class="d-flex text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <p class="card-text"><small class="text-body-secondary">22 Agustus 2023</small></p>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Temporibus iste doloribus dolor? Mollitia, quod rem nihil veniam, veritatis odio
                                        quasi porro nulla cumque odit ut ab earum id recusandae? Necessitatibus modi
                                        exercitationem voluptas voluptatum ut aperiam id? Deleniti voluptatem enim numquam
                                        itaque tempore molestiae possimus assumenda repudiandae ipsam! Odit, nisi.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
