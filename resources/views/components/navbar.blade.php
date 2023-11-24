@php
    use App\Models\Notification;

@endphp

<nav class="navbar container fixed-top navbar-expand-lg bg-body-tertiary">
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
                    <a class="nav-link fs-5 {{ $title == 'Home' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ $title == 'About' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ $title == 'Product' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('product') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ $title == 'Blog' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ $title == 'Contact Us' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('contact') }}">Contact Us</a>
                </li>
            </ul>
            @auth
                <ul class="navbar-nav me-2">
                    <li class="nav-item dropdown notifikasi-dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @php
                                $notifications = Notification::where('user_id', auth()->user()->id)
                                    ->where('title', '!=', 'Promosi')
                                    ->orderBy('created_at', 'desc')
                                    ->orderBy('read', 'asc')
                                    ->get();

                                $notificationUnread = Notification::where('user_id', auth()->user()->id)
                                    ->where('read', false)
                                    ->get();

                                $notificationPromoUnread = Notification::where('user_id', auth()->user()->id)
                                    ->where('title', 'Promosi')
                                    ->where('read', false)
                                    ->get();
                            @endphp

                            <i class="bi bi-bell fs-5">
                                @if (count($notificationUnread) > 0)
                                    <span
                                        class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                @endif
                            </i>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="width: 30rem">
                            @if (count($notifications) > 0)
                                <ul class="list-group overflow-auto" style="max-height: 200px;">
                                    <li>
                                        <a class="dropdown-header nav-link text-end text-primary"
                                            href="{{ url('/notifications') }}">Lihat Semua</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('notifications/promo') }}" class="nav-link">
                                            <div
                                                class="card shadow border-0 mx-2 mb-2 p-3 {{ count($notificationPromoUnread) > 0 ? 'bg-white text-primary' : '' }}">
                                                <div class="card-title fw-bold fs-5">Promo</div>
                                                @if (count($notificationPromoUnread) > 0)
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </a>
                                    </li>
                                    @foreach ($notifications as $notification)
                                        <li
                                            class="list-group-item mx-2 {{ $notification->read == false ? 'bg-white' : '' }}">
                                            <a href="#" class="nav-link notification-list"
                                                onclick="markAsRead('{{ route('notifications.mark-as-read', $notification) }}')">
                                                <h5
                                                    class="{{ $notification->read == false ? 'fw-bold text-primary' : '' }}">
                                                    {{ $notification->title }}</h5>
                                                <p>{!! $notification->content !!}</p>
                                                <small
                                                    class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="col-12 text-center d-flex align-items-center justify-content-center mt-5">
                                    <div>
                                        <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}"
                                            alt="404 not found">
                                        <h1 class="fs-4 mt-5">Belum ada <span
                                                class="fw-bolder text-primary">Notifikasi!</span>
                                        </h1>
                                        <p class="lead my-4 fs-5">Belum ada notifikasi</p>
                                    </div>
                                </div>
                            @endif
                        </ul>
                    </li>
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
                            @if (auth()->user()->img_path != null)
                                <img src="{{ URL::asset('/storage/' . auth()->user()->img_path) }}"
                                    class="rounded-circle profile" alt="foto profil"
                                    style="width: 1.5rem; height: 1.5rem; object-fit: cover">
                            @else
                                <i class="bi bi-person-circle fs-5 mx-2"></i>
                            @endif
                            <span class="fs-6 m-0">
                                {{ auth()->user()->name }}
                            </span>
                        </a>
                        <ul class="dropdown-menu bg-white border-0 shadow-sm">
                            <li><a class="dropdown-item" href="{{ url('profile') }}">
                                    <i class="bi bi-person-circle me-2"></i>
                                    Profile</a></li>
                            <li>
                            <li><a class="dropdown-item" href="{{ url('change-password') }}">
                                    <i class="bi bi-key me-2"></i>
                                    Change Password</a></li>
                            <li>
                            <li><a class="dropdown-item" href="{{ url('daftar-transaksi') }}">
                                    <i class="bi bi-card-list me-2"></i>
                                    Daftar Transaksi</a></li>
                            <li>
                            <li>
                                <hr class="dropdown-divider mx-2">
                            </li>
                            @if (auth()->user()->role == 'vendor')
                                <li><a class="dropdown-item" href="{{ url('vendor/toko') }}">
                                        <i class="bi bi-shop me-2"></i>
                                        Toko
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('vendor/produk') }}">
                                        <i class="bi bi-basket3-fill me-2"></i>
                                        Produk
                                    </a>
                                </li>
                            @else
                                <li><a class="dropdown-item" href="{{ url('vendor/daftar-toko') }}">
                                        <i class="bi bi-shop me-2"></i>
                                        Daftar Toko
                                    </a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider mx-2">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-left me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <a href="{{ url('login') }}" class="btn btn-primary me-2" type="submit">Login</a>
            @endauth
        </div>
    </div>
</nav>


<script>
    function markAsRead(url) {
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({}),
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON response
            }).then(data => {
                if (data.success) {
                    // Redirect to the specified URL
                    window.location.href = data.url_destination;
                } else {
                    console.error('Server response indicates failure:', data);
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }
</script>
