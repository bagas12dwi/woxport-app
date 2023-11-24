@extends('layouts.app')

@section('konten')
    <div class="container my-4">
        <div class="d-flex justify-content-end">
            <span class="badge text-bg-primary p-2 fs-5 mb-3 me-2"><i class="bi bi-shop fs-4 me-2"></i>
                {{ $vendor->vendor_name }}</span>
            <span class="badge text-bg-success p-2 fs-5 mb-3"><i class="bi bi-cash-stack fs-4 me-2"></i>
                @currency($paymentSuccess)</span>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <a href="{{ url('vendor/produk') }}" class="nav-link">
                    <div class="card border-0 bg-white shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-around align-items-center">
                                <i class="bi bi-basket3-fill fs-1 me-2 text-primary"></i>
                                <h4 class="fw-bold m-0 text-primary">{{ $jmlProduk }} Produk</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="{{ url('vendor/transaksi') }}" class="nav-link">
                    <div class="card border-0 bg-white shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-around align-items-center">
                                <i class="bi bi-clipboard2-data-fill fs-1 me-2 text-primary"></i>
                                <h4 class="fw-bold m-0 text-primary">{{ $payment }} Transaksi</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="{{ url('/vendor/transaksi/konfirmasi') }}" class="nav-link">
                    <div class="card border-0 bg-white shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-around align-items-center">
                                <i class="bi bi-clock-fill fs-1 me-2 text-primary"></i>
                                <h4 class="fw-bold m-0 text-primary">{{ $paymentConfirm }} Transaksi Belum<br>Disetujui</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <a href="{{ url('/vendor/edit-toko') }}" class="btn btn-primary mt-5"><i class="bi bi-pencil-square"></i> Edit
            Toko</a>
        <hr class="my-5">
        <h4 class="fw-bold mb-3 text-primary">
            Produk yang baru ditambahkan
        </h4>
        @if (count($products) > 0)
            @foreach ($products as $product)
                <div class="card mb-3 w-full border-0 bg-white shadow">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if (count($product->imageProduct) > 0)
                                <img src="{{ URL::asset('storage/' . $product->imageProduct[0]->img_path) }}"
                                    class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                                    style="height: 200px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $product->product_name }} </h5>
                                <p class="card-text text-truncate"> {{ $product->description }} </p>
                                <h5 class="card-text fw-bold text-primary text-start">
                                    @currency($product->promotion_price > 0 ? $product->promotion_price : $product->price)
                                    @if ($product->promotion_price > 0)
                                        <span class="text-decoration-line-through fs-6 text-dark">
                                            @currency($product->price)
                                        </span>
                                    @endif
                                </h5>
                                <div class="d-flex text-start justify-content-end w-full">

                                    <form action="{{ url('vendor/produk/' . $product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button href="" class="btn btn-danger me-3" data-toggle="tooltip"
                                            data-original-title="Hapus" onclick="return confirm('Apakah anda yakin?')">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                    <a href="{{ url('vendor/produk/' . $product->id . '/edit') }}" class="btn btn-dark">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div>
                    <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                    <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">produk!</span></h1>
                    <p class="lead my-4">Belum ada produk yang ditambahkan, <br> Silahkan tambahkan produk baru!</p>
                </div>
            </div>
        @endif
    </div>
@endsection
