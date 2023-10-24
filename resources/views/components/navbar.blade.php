<nav class="navbar container navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ URL::asset('assets/images/logo-atas.png') }}" alt="Bootstrap" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-5 active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="{{ url('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="{{ url('product') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="{{ url('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="{{ url('contact') }}">Contact Us</a>
                </li>
            </ul>
            <ul class="navbar-nav me-2">
                <li class="nav-item">
                    <a href="{{ url('cart') }}" class="nav-link fs-5">
                        <i class="bi bi-cart fs-5 ms-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('wishlist') }}" class="nav-link fs-5">
                        <i class="bi bi-heart fs-5 ms-2"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle fs-5 ms-2"></i>
                    </a>
                    <ul class="dropdown-menu bg-white border-0 shadow-sm">
                        <li><a class="dropdown-item" href="#">
                                <i class="bi bi-person-circle me-2"></i>
                                Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">
                                <i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button class="btn btn-primary me-2" type="submit">Login</button>
        </div>
    </div>
</nav>
