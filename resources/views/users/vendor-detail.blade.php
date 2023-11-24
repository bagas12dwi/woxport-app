@php
    use Carbon\Carbon;
@endphp

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
                <h5 class="fw-bold text-primary">@currency($vendor->promotion_price > 0 ? $vendor->promotion_price : $vendor->price)
                    @if ($vendor->promotion_price > 0)
                        <span class="text-decoration-line-through text-dark fs-6">
                            @currency($vendor->price)
                        </span>
                    @endif
                </h5>
                <div class="d-flex text-warning">
                    @php
                        $rating = $comments->count() > 0 ? round($comments->sum('rating') / $comments->count(), 1) : 0;
                        if ($rating - floor($rating) >= 0.5) {
                            $rating = ceil($rating);
                        } else {
                            // Jika fraksi kurang dari atau sama dengan 0.5, bulatkan ke bawah
                            $rating = floor($rating);
                        }

                        $bintangKosong = 5 - $rating;
                    @endphp
                    @for ($i = 0; $i < $rating; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                    @for ($i = 0; $i < $bintangKosong; $i++)
                        <i class="bi bi-star"></i>
                    @endfor
                    <p class="ms-2 text-dark">({{ count($comments) }} Komentar)</p>
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
                        <button type="submit" class="btn btn-primary ms-2 align-self-start"><i
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
                        aria-controls="tab1" aria-selected="true">Deskripsi</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                        aria-controls="tab2" aria-selected="false">Komentar ({{ count($comments) }})</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabsContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <h3 class="mt-3">{{ $vendor->product_name }}</h3>
                    <p>{{ $vendor->description }}</p>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <div class="d-flex my-3">
                        <h3 class="me-3">Komentar ({{ count($comments) }})</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="{{ auth()->user() ? '#commentModal' : '#warningModal' }} ">
                            Tambahkan Komentar
                        </button>
                    </div>
                    @foreach ($comments as $comment)
                        <div class="card mb-3 bg-light border-0 shadow p-2">
                            <div class="row g-0">
                                <div class="col-lg-1 col-md-2 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('assets/images/profil.jpg') }}" class="rounded-circle">
                                </div>
                                <div class="col-lg-11 col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $comment->user->name }}</h5>
                                        <div class="d-flex text-warning">
                                            @php
                                                $bintangKosong = 5 - $comment->rating;
                                            @endphp
                                            @for ($i = 0; $i < $comment->rating; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                            @for ($i = 0; $i < $bintangKosong; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </div>
                                        <p class="card-text">
                                            <small
                                                class="text-body-secondary">{{ \Carbon\Carbon::parse($comment->created_at)->locale('id_ID')->format('d F Y') }}</small>
                                        </p>
                                        <p class="card-text">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="commentModalLabel">Tambahkan Komentar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/comment') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea class="form-control" id="comment" name="comment" required></textarea>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $vendor->id }}">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" class="form-control" id="rating" name="rating" required
                            min="1" max="5">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Silahkan login untuk menambahkan komentar!
            </div>
        </div>
    </div>
</div>
