@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Artikel <span class="text-dark">Kami </span></h1>
        <div class="row g-4">
            @if (count($blogs) > 0)
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-sm-12">
                        <div class="card mb-3">
                            <img src="{{ URL::asset('/storage/' . $blog->img_path) }}" class="card-img-top" alt=""
                                style="height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"> {{ $blog->title }} </h5>
                                <div
                                    style="max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <p class="card-text">{!! $blog->body !!}</p>
                                </div>
                                <a href="{{ url('blog/detail/' . $blog->id) }}" class="btn btn-primary">Lanjut Baca</a>
                                <p class="card-text"><small class="text-body-secondary">Terakhir Diupdate
                                        {{ $blog->updated_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div>
                        <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                        <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">Blog!</span></h1>
                        <p class="lead my-4">Belum ada blog yang ditambahkan</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
