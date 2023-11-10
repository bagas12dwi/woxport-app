@extends('layouts.app')

@section('konten')
    <div class="container my-4">
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
                <div class="card border-0 bg-white shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-around align-items-center">
                            <i class="bi bi-clipboard2-data-fill fs-1 me-2 text-primary"></i>
                            <h4 class="fw-bold m-0 text-primary">{{ '8' }} Transaksi</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-white shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-around align-items-center">
                            <i class="bi bi-clock-fill fs-1 me-2 text-primary"></i>
                            <h4 class="fw-bold m-0 text-primary">{{ '8' }} Transaksi Belum<br>Disetujui</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5">
        <h4 class="fw-bold mb-3 text-primary">
            Produk yang baru ditambahkan
        </h4>
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
                            <p class="card-text text-ellipsis"> {{ $product->description }} </p>
                            <p class="card-text fs-4"><small class="text-body-secondary">Rp. {{ $product->price }} </small>
                            </p>
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
    </div>
@endsection
