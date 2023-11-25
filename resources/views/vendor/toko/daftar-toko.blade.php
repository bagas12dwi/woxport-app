@extends('layouts.app')

@section('konten')
    <div class="container my-3">
        <h1 class="text-uppercase text-primary fw-bold mb-3 text-center">Daftar <span class="text-dark">Toko </span></h1>
        <div class="card bg-white border-0 shadow p-4">
            <form action="{{ url('vendor/daftar-toko') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="vendor_name" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Nama Toko">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Rekening</label>
                    <select class="form-select form-select-md" name="bank_account_id">
                        <option selected>-- Pilih Rekening ---</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bank_account_number" class="form-label">No. Rekening</label>
                    <input type="number" class="form-control" name="bank_account_number" id="bank_account_number"
                        placeholder="No. Rekening">
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <select class="form-select" name="province" id="province">
                        <option selected>-- Pilih Provinsi --</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province['id'] }}">{{ $province['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="regency" class="form-label">Kabupaten / Kota</label>
                    <select class="form-select" name="regency" id="regency" disabled>
                        <option selected>-- Pilih Kabupaten --</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the province and regency dropdown elements
            const provinceDropdown = document.getElementById('province');
            const regencyDropdown = document.getElementById('regency');

            // Add event listener to the province dropdown
            provinceDropdown.addEventListener('change', function() {
                const selectedProvinceId = this.value;

                // If a province is selected, make an API request for corresponding regencies
                if (selectedProvinceId !== '') {
                    // Replace the URL with the correct API endpoint
                    const apiUrl =
                        `https://bagas12dwi.github.io/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`;

                    // Enable the regency dropdown while making the request
                    regencyDropdown.disabled = false;

                    // Clear existing options
                    regencyDropdown.innerHTML = '<option selected>-- Pilih Kabupaten --</option>';

                    // Fetch the regencies
                    fetch(apiUrl)
                        .then(response => response.json())
                        .then(data => {
                            // Populate the regency dropdown with fetched data
                            data.forEach(regency => {
                                const option = document.createElement('option');
                                option.value = regency.id;
                                option.text = regency.name;
                                regencyDropdown.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching regencies:', error);
                        });
                } else {
                    // If no province is selected, disable the regency dropdown
                    regencyDropdown.disabled = true;
                    // Clear existing options
                    regencyDropdown.innerHTML = '<option selected>-- Pilih Kabupaten --</option>';
                }
            });
        });
    </script>
@endpush
