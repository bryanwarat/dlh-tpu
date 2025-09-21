@extends('layouts.admin.app')

@section('title', 'Add Cemetery')
@section('meta_description', 'Form tambah data TPU')
@section('meta_author', 'Admin')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Tambah TPU</h4>
        </div>
        <div class="ms-auto mt-2 mt-sm-0">
            <a href="{{ route('admin.cemetery.index') }}" class="btn btn-primary">Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Tambah TPU</h5>
        </div>

        <div class="card-body">
            <form id="cemeteryForm" action="{{ route('admin.cemetery.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Kolom kiri -->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama TPU</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Masukkan nama TPU" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Masukkan alamat TPU"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Lokasi (Leaflet Map)</label>
                            <div id="map" style="height: 400px; border-radius: 8px;"></div>
                        </div>
                    </div>

                    <input hidden type="text" id="latitude" name="latitude" class="form-control" readonly>
                    <input hidden type="text" id="longitude" name="longitude" class="form-control" readonly>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-primary" id="btnSubmit">
                        <i class="mdi mdi-content-save"></i> Simpan
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

    <!-- Leaflet Geocoder untuk pencarian -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi map di Manado
            var map = L.map('map').setView([1.474830, 124.842079], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker;

            // Klik map untuk pilih lokasi
            function onMapClick(e) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(e.latlng).addTo(map);

                document.getElementById("latitude").value = e.latlng.lat.toFixed(6);
                document.getElementById("longitude").value = e.latlng.lng.toFixed(6);
            }

            map.on('click', onMapClick);

            // Tambahkan kontrol pencarian
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

            // Konfirmasi submit dengan SweetAlert
            document.getElementById("btnSubmit").addEventListener("click", function() {
                Swal.fire({
                    title: 'Simpan Data?',
                    text: "Pastikan data sudah benar",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("cemeteryForm").submit();
                    }
                });
            });

            // Tampilkan pesan sukses/error (langsung di sini)
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
