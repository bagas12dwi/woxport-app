@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Wishlist <span class="text-dark">Ku </span></h1>
        <div class="row g-4">
            @if (count($wishlists) > 0)
                @foreach ($wishlists as $wishlist)
                    <div class="col-md-3 col-sm-12">
                        <div class="card bg-white shadow border-0 card-product">
                            @if (count($wishlist->product->imageProduct) > 0)
                                <img src="{{ URL::asset('storage/' . $wishlist->product->imageProduct[0]->img_path) }}"
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
                                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                        <button type="submit" class="btn btn-primary mb-2">Tambahkan ke Keranjang</button>
                                    </form>
                                    <a href="{{ url('vendor/detail/' . $wishlist->product->id) }}"
                                        class="btn btn-light mb-2">Lihat Detail</a>
                                    <form action="{{ url('/wishlist/' . $wishlist->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                                <h5 class="card-title fw-bold text-primary text-center">
                                    @currency($wishlist->product->price)
                                    <span class="text-decoration-line-through fs-6 text-dark">
                                        @currency($wishlist->product->price + 100000)
                                    </span>
                                </h5>
                                <p class="card-text text-center">{{ $wishlist->product->product_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div>
                        <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                        <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">produk!</span></h1>
                        <p class="lead my-4">Belum ada produk yang ditambahkan ke wishlist</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
