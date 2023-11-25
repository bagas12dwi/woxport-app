@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Pencarian <span class="text-dark">Vendor</span>
        </h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-filter-right"></i> Filter
        </button>
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
                                        <button type="submit" class="btn btn-primary mb-2">Tambahkan ke Keranjang</button>
                                    </form>
                                    <a href="{{ url('vendor/detail/' . $vendor->id) }}" class="btn btn-light">Lihat
                                        Detail</a>
                                </div>
                                <h5 class="card-title fw-bold text-primary text-center">@currency($vendor->promotion_price > 0 ? $vendor->promotion_price : $vendor->price)
                                    @if ($vendor->promotion_price > 0)
                                        <span class="text-decoration-line-through fs-6 text-dark">
                                            @currency($vendor->price)
                                        </span>
                                    @endif
                                </h5>
                                <p class="card-text text-center mb-0">{{ $vendor->product_name }}</p>
                                <p class="card-text text-center my-0 fs-6 text-muted">{{ $vendor->vendor->regency }},
                                    {{ $vendor->vendor->province }}</p>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filter Berdasarkan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/vendor/search') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="province" class="form-label">Provinsi</label>
                            <select class="form-select" name="province" id="province">
                                <option value="0" selected>-- Pilih Provinsi --</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province['name'] }}">{{ $province['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="price" value="asc">
                                <label class="form-check-label" for="price">
                                    Harga Termurah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="priceMahal"
                                    value="desc">
                                <label class="form-check-label" for="priceMahal">
                                    Harga Termahal
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="category_id" value="{{ $category_id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
