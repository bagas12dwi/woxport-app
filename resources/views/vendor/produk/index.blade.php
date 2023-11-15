@extends('layouts.app')

@section('konten')
    <div class="container my-4">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                </svg>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                </svg>
                <div>
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">{{ $title }} <span class="text-dark">Ku
            </span>
        </h1>
        <a href="{{ url('vendor/produk/create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill me-2"></i>Tambahkan {{ $title }}
        </a>
        <div class="row g-4 mt-2">

            @if (count($product) > 0)
                @foreach ($product as $item)
                    <div class="col-md-4 col-sm-12">
                        <div class="card bg-white shadow border-0 card-product">
                            @if (count($item->imageProduct) > 0)
                                <img src="{{ URL::asset('storage/' . $item->imageProduct[0]->img_path) }}"
                                    class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ URL::asset('/assets/images/wo.jpg') }}" class="card-img-top" alt="Image"
                                    style="height: 200px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <div
                                    class="btn-product text-center flex-column align-items-center justify-content-center text-white rounded">

                                    <form action="{{ url('vendor/produk/' . $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button href="" class="btn btn-danger mb-3" data-toggle="tooltip"
                                            data-original-title="Hapus" onclick="return confirm('Apakah anda yakin?')">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                    <a href="{{ url('vendor/produk/' . $item->id . '/edit') }}" class="btn btn-light">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                </div>
                                <h5 class="card-title fw-bold text-primary text-center">Rp. {{ $item->price }} <span
                                        class="text-decoration-line-through fs-6 text-dark">Rp.
                                        {{ $item->price + 100000 }}</span></h5>
                                <p class="card-text text-center">{{ $item->product_name }}</p>

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
    </div>
@endsection
