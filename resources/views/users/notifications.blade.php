@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Notifikasi</span></h1>
        @if (count($notifications) > 0)
            @foreach ($notifications as $notification)
                <a href="#"
                    class="text-decoration-none card shadow border-0 mb-3 {{ $notification->read == false ? 'bg-white' : '' }}"
                    onclick="markAsRead('{{ route('notifications.mark-as-read', $notification) }}')">
                    <div class="card-title d-flex justify-content-between p-4 align-items-center mb-0">
                        <div class="{{ $notification->read == false ? 'fw-bold text-primary' : '' }} fs-4">
                            {{ $notification->title }}</div>
                    </div>
                    <div class="card-body">
                        <div class="fs-5">{!! $notification->content !!} </div>
                        <div class="fs-5">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div>
                    <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                    <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">notifikasi!</span></h1>
                    <p class="lead my-4">Belum ada notifikasi</p>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('script')
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
@endpush
