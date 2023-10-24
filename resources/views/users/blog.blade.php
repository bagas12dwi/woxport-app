@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Our <span class="text-dark">Blog </span></h1>
        <div class="row g-4">
            <div class="col-md-6 col-sm-12">
                <div class="card mb-3">
                    <img src="{{ URL::asset('/assets/images/b-1.jpg') }}" class="card-img-top" alt=""
                        style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Popular</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="{{ url('blog/detail') }}" class="btn btn-primary">Read More</a>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card mb-3">
                    <img src="{{ URL::asset('/assets/images/b-1.jpg') }}" class="card-img-top" alt=""
                        style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Popular</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="{{ url('blog/detail') }}" class="btn btn-primary">Read More</a>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card mb-3">
                    <img src="{{ URL::asset('/assets/images/b-1.jpg') }}" class="card-img-top" alt=""
                        style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Popular</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="{{ url('blog/detail') }}" class="btn btn-primary">Read More</a>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card mb-3">
                    <img src="{{ URL::asset('/assets/images/b-1.jpg') }}" class="card-img-top" alt=""
                        style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Popular</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="{{ url('blog/detail') }}" class="btn btn-primary">Read More</a>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
