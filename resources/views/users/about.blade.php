@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Tentang <span class="text-dark">Kami </span></h1>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h3 class="text-uppercase fw-bold">Woxport <br>(Wedding Organizer Expert Portal)</h3>
                <p>
                    Dengan jaringan vendor pernikahan lokal terbesar, Woxport menawarkan situs pernikahan terlengkap di
                    Indonesia. Woxport sebagai portal yang menghimpun, mewadahi, dan menghubungkan pasangan atau pengguna
                    dengan berbagai macam vendor yang tersebar di nusantara. Anda dapat menemukan vendor pernikahan terbaik
                    sesuai anggaran dan merencanakan pernikahan Anda persis seperti yang anda bayangkan. Kami membuatnya
                    mudah untuk menemukan harga, ketersediaan, dan jawaban yang anda butuhkan dari tempat pernikahan dan
                    vendor pernikahan di setiap kota.
                </p>
            </div>
            <div class="col-md-3 col-sm-12 text-center">
                <img src="{{ URL::asset('/assets/images/about.avif') }}" alt="About" style="height: 30rem;">
            </div>
        </div>
    </div>
@endsection
