@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ URL::asset('assets/images/categori-a.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ URL::asset('assets/images/categori-a.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ URL::asset('assets/images/categori-a.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
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
                    <h3 class="fw-bold">Glamour Wedding</h3>
                    <form action="">
                        <button class="btn btn-primary ms-2"><i class="bi bi-heart"></i></button>
                    </form>
                </div>
                <hr>
                <h5 class="fw-bold text-primary">Rp. 100.000 <span class="text-decoration-line-through text-dark">Rp.
                        200.000</span></h5>
                <div class="d-flex text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <p class="ms-2 text-dark">(5 Customer review)</p>
                </div>
                <hr>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi saepe veritatis voluptas tenetur
                    voluptatum, iusto quod sequi consectetur velit illo neque earum a quibusdam rem animi corrupti nemo
                    numquam! Deserunt est sit quo sapiente perferendis iusto voluptatem, at ea vero facilis? Ipsam quasi
                    accusamus fuga illo, soluta aut? Quae, reiciendis.</p>
                <form action="#">
                    <div class="d-flex">
                        <div class="mb-3">
                            <input type="number" class="form-control" name="qty" id="qty"
                                aria-describedby="helpqty" placeholder="0">
                            <small id="helpqty" class="form-text text-muted">Masukkan Qty pesan</small>
                        </div>
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
                    <h3 class="mt-3">Glamour Wedding</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro quam voluptates aliquid, ab iure,
                        temporibus tenetur totam eligendi magni qui est debitis nemo eos ex quaerat recusandae ducimus
                        deleniti cum praesentium iste incidunt. Et culpa fugiat, nobis aspernatur natus at fugit, alias
                        praesentium beatae nemo dolorem adipisci reiciendis! Nostrum quod aut nisi cum illo maxime aperiam
                        inventore cupiditate ipsam eos rem, eligendi iste, delectus fuga, eveniet quibusdam neque. Repellat
                        facere molestiae soluta. Repellat laudantium at, consequatur, voluptatem animi perspiciatis earum
                        amet fugiat sint natus ipsa possimus quo totam a voluptas iusto dolore atque hic magni ducimus quae
                        consequuntur esse enim.</p>
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
