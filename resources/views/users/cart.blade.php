@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Keranjang <span class="text-dark">Ku </span></h1>
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                </svg>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        @if (count($groupedCarts) > 0)
            <div class="row g-2">
                <div class="col-md-8 col-sm-6">
                    @foreach ($groupedCarts as $vendorId => $cartsByVendor)
                        @php
                            $vendor = $cartsByVendor->first()->product->vendor;
                        @endphp

                        <div class="card bg-white border-0 shadow p-4 mb-4">
                            <div class="card-title">
                                <div class="form-check fs-5">
                                    <input class="form-check-input checkVendor checkVendor_{{ $vendorId }}"
                                        type="checkbox" value="" id="checkVendor_{{ $vendorId }}">
                                    <label class="form-check-label fw-bold" for="checkVendor_{{ $vendorId }}">
                                        {{ $vendor->vendor_name }}
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($cartsByVendor as $cart)
                                    <div class="card bg-white border-0">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="form-check fs-5 d-flex align-items-center">
                                                    <input class="form-check-input checkCart checkCart_{{ $vendorId }}"
                                                        type="checkbox" id="checkCart_{{ $cart->id }}">
                                                </div>
                                                @if (count($cart->product->imageProduct) > 0)
                                                    <img src="{{ URL::asset('storage/' . $cart->product->imageProduct[0]->img_path) }}"
                                                        class="card-img-top" alt="Image"
                                                        style="width: 200px; object-fit: cover;">
                                                @else
                                                    <img src="{{ URL::asset('/assets/images/wo.jpg') }}"
                                                        class="card-img-top" alt="Image"
                                                        style="width: 200px; object-fit: cover;">
                                                @endif
                                                <div class="d-flex flex-column ms-2 w-100">
                                                    <h5 class="card-title fw-bold">{{ $cart->product->product_name }}</h5>
                                                    <p class="card-text mb-auto">
                                                        @currency($cart->product->promotion_price > 0 ? $cart->product->promotion_price : $cart->product->price)</p>
                                                    <p class="card-text mb-auto d-none"
                                                        id="hargaBarang_{{ $cart->id }}">
                                                        {{ $cart->product->promotion_price > 0 ? $cart->product->promotion_price : $cart->product->price }}
                                                    </p>
                                                    <div class="d-flex flex-row">
                                                        <form action="{{ url('cart/' . $cart->id) }}" method="POST"
                                                            class="ms-auto me-2">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn p-0">
                                                                <i class="bi bi-trash fs-3"></i>
                                                            </button>
                                                        </form>
                                                        <div class="mb-1">
                                                            <input type="number" class="form-control" name="qty"
                                                                id="qty_{{ $cart->id }}" aria-describedby="helpqty"
                                                                placeholder="0" value="{{ $cart->qty }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card bg-white shadow border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">
                                Ringkasan Pesanan
                            </h5>
                            <div class="d-flex justify-content-between">
                                <h6 class="text-muted total-barang">Harga Barang (0 Barang)</h6>
                                <h6 class="text-muted harga-barang">Rp. 0</h6>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <h6 class="fw-bold">Total Harga</h6>
                                <h6 class="fw-bold total-harga-barang">Rp. 0</h6>
                            </div>
                            <button class="btn btn-primary w-100 disabled">
                                Beli (0)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div>
                    <img class="img-fluid w-75" src="{{ URL::asset('/assets/images/404.svg') }}" alt="404 not found">
                    <h1 class="mt-5">Belum ada <span class="fw-bolder text-primary">produk!</span></h1>
                    <p class="lead my-4">Belum ada produk yang ditambahkan ke Keranjang</p>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            function updateSummary() {
                var totalChecked = $('.checkCart:checked').length;
                var totalHarga = 0;

                $('.checkCart:checked').each(function() {
                    var cartId = $(this).attr('id').split('_')[1];
                    var qty = parseInt($('#qty_' + cartId).val(), 10) || 1; // Ensure correct parsing of qty
                    var hargaBarang = parseFloat($('#hargaBarang_' + cartId).text().replace(/[^0-9.-]+/g,
                        '')); // Remove non-numeric characters

                    totalHarga += hargaBarang * qty;
                });

                $('.total-barang').text('Harga Barang (' + totalChecked + ' Barang)');
                $('.harga-barang').text('Rp. ' + totalHarga.toLocaleString(
                    'id-ID')); // Use 'id-ID' for Indonesian locale
                $('.total-harga-barang').text('Rp. ' + totalHarga.toLocaleString('id-ID'));
                $('.btn-primary').text('Beli (' + totalChecked + ')');
                if (totalChecked != 0) {
                    $('.btn-primary').removeClass('disabled');
                } else {
                    $('.btn-primary').addClass('disabled');
                }
            }

            $('.checkCart').change(function() {
                var vendorId = $(this).attr('id').split('_')[1];

                // Uncheck other vendors
                $('.checkVendor').not(this).prop('checked', false);

                // Uncheck carts from other vendors
                $('.checkCart').not('.checkCart_' + vendorId).prop('checked', false);

                // Check carts of the selected vendor
                $('.checkVendor.checkVendor_' + vendorId).prop('checked', this.checked);

                updateSummary();
            });

            $('.checkVendor').change(function() {
                var vendorId = $(this).attr('id').split('_')[1];

                // Uncheck other vendors
                $('.checkVendor').not(this).prop('checked', false);

                // Uncheck carts from other vendors
                $('.checkCart').not('.checkCart_' + vendorId).prop('checked', false);

                // Check carts of the selected vendor
                $('.checkCart.checkCart_' + vendorId).prop('checked', this.checked);

                updateSummary();
            });

            // Add event listener for input changes in quantity
            $('input[name="qty"]').on('input', function() {
                updateSummary();
            });

            // Initialize on page load
            updateSummary();

            $('.btn-primary').click(function() {
                var checkedCarts = $('.checkCart:checked');
                var cartIds = [];

                checkedCarts.each(function() {
                    var cartId = $(this).attr('id').split('_')[1];
                    cartIds.push(cartId);
                });

                // Send an AJAX request to store the payment
                $.ajax({
                    url: '{{ url('payment/store') }}',
                    type: 'POST',
                    data: {
                        cart_ids: cartIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/payment/' + response.order_number;
                    },
                    error: function(error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
        });
    </script>
@endpush
