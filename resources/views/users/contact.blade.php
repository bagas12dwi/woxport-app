@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Kontak <span class="text-dark">Kami </span></h1>

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
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                            placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3 text-start">
                        <label for "email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email"
                            placeholder="Email">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone"
                            placeholder="No. Telepon">
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
@endsection
