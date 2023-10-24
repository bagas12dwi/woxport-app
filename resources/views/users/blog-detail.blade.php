@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <div class="text-center">
            <img src="{{ URL::asset('/assets/images/b-1.jpg') }}" alt="" class="img-fluid" style="max-height: 400px;">
        </div>
        <h1 class="fw-bold">
            Popular
        </h1>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        <p>
            <!-- Add responsive classes for text -->
            <small class="d-md-block d-sm-block"> <!-- Hide on mobile, show on tablet and larger screens -->
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore recusandae ex vero nisi, magnam fugiat ut
                ipsa dicta delectus consectetur iusto obcaecati, id nobis exercitationem quidem laudantium! Assumenda nam
                doloremque nulla aliquam officiis iusto deleniti voluptatibus. In, ut corporis quos magni quas sunt commodi
                odio quia quis itaque consequuntur, vel veniam amet velit eos quod deserunt, fuga a iusto corrupti maxime
                ipsa! Odit error dolores quidem dolor est consectetur amet rem ipsam quia ducimus doloribus ullam incidunt
                eaque, excepturi repellat, ex perferendis inventore consequuntur culpa commodi deleniti earum non. Eum
                dolorem ipsum quos voluptatem! Repudiandae, quam eaque blanditiis aspernatur ab fugiat provident quibusdam.
                Culpa autem nihil a quidem, aspernatur odio animi, porro perspiciatis distinctio et rem consequatur.
                Voluptatem perspiciatis dolorem eum ut neque itaque assumenda et asperiores ullam. Cupiditate at dicta
                itaque dolorem quo ducimus repellat ut perspiciatis nemo sapiente sint, ipsam quae facere iste, accusamus
                assumenda eligendi, repellendus quia consequuntur quibusdam velit praesentium labore rem iusto. Quasi aut
                minus quibusdam quia repellat deleniti minima, voluptatem totam dolores magnam officia nobis porro, quidem
                sapiente earum optio alias architecto inventore, autem placeat odio quis voluptatum veniam fugit.
                Perspiciatis voluptas, repellendus accusantium, ullam eligendi cupiditate quasi et cum doloribus qui
                asperiores fugit.
            </small>
        </p>
        <a class="btn btn-primary" href="{{ url('blog') }}">
            < Back </a>
    </div>
@endsection
