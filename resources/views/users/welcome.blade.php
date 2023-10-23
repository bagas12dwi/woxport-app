@extends('layouts.app')

@section('konten')
    <section id="home">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-sm-12">
                    <h1 class="text-uppercase fw-bold text-primary text-start" style="font-size: 4rem">Find Your <br> Wedding
                        <br>
                        <span class="text-black"> In Here!</span>
                    </h1>
                    <button class="btn btn-primary text-uppercase fw-bold">Shop Now ></button>
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                    <img src="{{ URL::asset('/assets/images/main-bg.png') }}" alt="home" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="my-5" id="fitur">
        <div class="container-md services">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="shipping rounded-circle ms-auto me-auto d-flex align-items-center justify-content-center">
                        <i class="bi bi-shield-fill-check fs-1 text-light"></i>
                    </div>
                    <h5 class="text-uppercase fw-bold">Aman</h5>
                    <p class="text-uppercase">100% Terjaga</p>
                </div>
                <div class="col-md-4">
                    <div class="shipping rounded-circle ms-auto me-auto d-flex align-items-center justify-content-center">
                        <i class="bi bi-bag-check-fill fs-1 text-light"></i>
                    </div>
                    <h5 class="text-uppercase fw-bold">Berkualitas</h5>
                    <p class="text-uppercase">Pelayanan Berkulitas Tinggi</p>
                </div>
                <div class="col-md-4">
                    <div class="shipping rounded-circle ms-auto me-auto d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle-fill fs-1 text-light"></i>
                    </div>
                    <h5 class="text-uppercase fw-bold">Terpercaya</h5>
                    <p class="text-uppercase">Berkolaborasi Dengan Banyak Mitra</p>
                </div>
            </div>
        </div>
    </section>

    <section id="kategori">
        <div class="container text-center">
            <h1 class="text-uppercase text-primary fw-bold mb-3">Our <span class="text-dark">Categories </span></h1>
            <div class="row g-2">
                <div class="col-lg-4 col-md-6">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{ URL::asset('/assets/images/categori-a.jpg') }}" class="card-img-top" alt="vendor"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Vendor</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{ URL::asset('/assets/images/categori-b.avif') }}" class="card-img-top" alt="package"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Venue</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{ URL::asset('/assets/images/categori-c.jpg') }}" class="card-img-top" alt="package"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Package</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="rekomendasi" class="my-5">
        <div class="container text-center">
            <h1 class="text-uppercase text-primary fw-bold mb-3">Top <span class="text-dark">recommendation</span></h1>
            <div class="row g-2">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mx-auto bg-white border-0 shadow" style="width: 16rem;">
                        <img src="{{ URL::asset('/assets/images/rec-1.jpg') }}" class="card-img-top img-fluid"
                            alt="Glamour Wedding" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-uppercase">Glamour Wedding</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mx-auto bg-white border-0 shadow" style="width: 16rem;">
                        <img src="{{ URL::asset('/assets/images/rec-2.jpg') }}" class="card-img-top img-fluid"
                            alt="Dream Mua" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-uppercase">Dream Mua</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mx-auto bg-white border-0 shadow" style="width: 16rem;">
                        <img src="{{ URL::asset('/assets/images/rec-3.jpg') }}" class="card-img-top" alt="Abphotography"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-uppercase">Abphotography</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mx-auto bg-white border-0 shadow" style="width: 16rem;">
                        <img src="{{ URL::asset('/assets/images/rec-4.jpg') }}" class="card-img-top" alt="Mommy Cathering"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-uppercase">Mommy Cathering</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="kontak" class="mb-3">
        <div class="container text-center">
            <h1 class="text-uppercase text-primary fw-bold mb-3">Contact <span class="text-dark">Us</span></h1>
            <div class="row">
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3722650299005!2d112.72254819999999!3d-7.312009999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb96e6440fc9%3A0xd202778cbffa16bd!2sKetintang%20Park%20Residence!5e0!3m2!1sen!2sid!4v1698041263700!5m2!1sen!2sid"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <form action="#">
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" id="name"
                                aria-describedby="name" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3 text-start">
                            <label for "email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="email" placeholder="Email">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                aria-describedby="phone" placeholder="No. Telepon">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
