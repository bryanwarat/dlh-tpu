@extends('layouts.admin.app')

@section('title', 'Edit Cemetery')
@section('meta_description', 'Form edit data TPU')
@section('meta_author', 'Admin')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit TPU</h4>
        </div>
        <div class="ms-auto mt-2 mt-sm-0">
            <a href="{{ route('admin.cemetery.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit TPU</h5>
        </div>

        <div class="card-body">
            <form id="cemeteryForm" action="{{ route('admin.cemetery.update', $cemetery->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama TPU</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $cemetery->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1" {{ $cemetery->status == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $cemetery->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $cemetery->address) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Lokasi (Leaflet Map)</label>
                            <div id="map" style="height: 400px; border-radius: 8px;"></div>
                        </div>
                    </div>

                    <input hidden type="text" id="latitude" name="latitude"
                        value="{{ old('latitude', $cemetery->latitude) }}" readonly>
                    <input hidden type="text" id="longitude" name="longitude"
                        value="{{ old('longitude', $cemetery->longitude) }}" readonly>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-primary" id="btnSubmit">
                        <i class="mdi mdi-content-save"></i> Update
                    </button>
                    <a href="{{ route('admin.cemetery.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Leaflet JS & CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lat = "{{ $cemetery->latitude ?? 1.47483 }}";
            var lng = "{{ $cemetery->longitude ?? 124.842079 }}";

            var map = L.map('map').setView([lat, lng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([lat, lng]).addTo(map);

            function onMapClick(e) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(e.latlng).addTo(map);

                document.getElementById("latitude").value = e.latlng.lat.toFixed(6);
                document.getElementById("longitude").value = e.latlng.lng.toFixed(6);
            }
            map.on('click', onMapClick);

            var geocoder = L.Control.geocoder({
                defaultMarkGeocode: false
            }).addTo(map);

            geocoder.on('markgeocode', function(e) {
                var latlng = e.geocode.center;
                map.setView(latlng, 16);

                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(latlng).addTo(map);

                document.getElementById("latitude").value = latlng.lat.toFixed(6);
                document.getElementById("longitude").value = latlng.lng.toFixed(6);
            });

            document.getElementById("btnSubmit").addEventListener("click", function() {
                Swal.fire({
                    title: 'Update Data?',
                    text: "Pastikan data sudah benar",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Update!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("cemeteryForm").submit();
                    }
                });
            });

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                });
            @endif
        });
    </script>
@endpush
