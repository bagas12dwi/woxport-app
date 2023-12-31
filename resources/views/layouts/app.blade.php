<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Woxport') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/style.css') }}">
</head>

<body style="overflow-x: hidden;">
    <div id="app">
        @include('components.navbar')

        <main class="py-4 mt-5">
            @yield('konten')
        </main>
        @include('components.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @stack('script')
</body>

</html>
