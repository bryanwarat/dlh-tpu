@extends('layouts.admin.app')

@section('title', 'Detail Cemetery')
@section('meta_description', 'Detail data TPU')
@section('meta_author', 'Admin')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Detail TPU</h4>
        </div>
        <div class="ms-auto mt-2 mt-sm-0">
            <a href="{{ route('admin.cemetery.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Informasi TPU</h5>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Nama TPU</dt>
                <dd class="col-sm-9">{{ $cemetery->name }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">
                    @if ($cemetery->status == 1)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </dd>

                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9">{{ $cemetery->address ?? '-' }}</dd>

            </dl>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Lokasi TPU</h5>
        </div>
        <div class="card-body">
            <div id="map" style="height: 400px; border-radius: 8px;"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Leaflet JS & CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lat = "{{ $cemetery->latitude ?? 1.47483 }}";
            var lng = "{{ $cemetery->longitude ?? 124.842079 }}";

            var map = L.map('map').setView([lat, lng], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            if ("{{ $cemetery->latitude }}" && "{{ $cemetery->longitude }}") {
                L.marker([lat, lng]).addTo(map)
                    .bindPopup("{{ $cemetery->name }}")
                    .openPopup();
            }
        });
    </script>
@endpush
