@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <div class="text-center">
            <img src="{{ URL::asset('/storage/' . $blog->img_path) }}" alt="" class="img-fluid"
                style="max-height: 400px;">
        </div>
        <h1 class="fw-bold">
            {{ $blog->title }}
        </h1>
        <p class="card-text"><small class="text-body-secondary">Terakhir Diubah
                {{ $blog->updated_at->diffForHumans() }}</small></p>
        <p>
            <!-- Add responsive classes for text -->
            <small class="d-md-block d-sm-block"> <!-- Hide on mobile, show on tablet and larger screens -->
                {!! $blog->body !!}
            </small>
        </p>
        <a class="btn btn-primary" href="{{ url('blog') }}">
            <i class="bi bi-arrow-left"></i> Kembali </a>
    </div>
@endsection
