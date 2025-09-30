@extends('layouts.admin.app')

@section('title', 'Detail Reservasi #' . $reservation->id)
@section('meta_description', 'Detail data reservasi pemakaman')
@section('meta_author', 'Admin')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Detail Reservasi Pemakaman</h4>
            <p class="text-muted">ID Reservasi: #{{ $reservation->id }}</p>
        </div>
        <div class="flex-shrink-0 mt-sm-0 mt-3">
            <a href="{{ route('admin.reservation.index') }}" class="btn btn-secondary">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        {{-- Status dan Informasi Umum --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white">Informasi</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Status:</strong>
                            @php
                                $status = $reservation->status;
                                if ($status == 1) {
                                    echo '<span class="badge bg-success">Disetujui</span>';
                                } elseif ($status == 0) {
                                    echo '<span class="badge bg-warning">Menunggu Verifikasi</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Ditolak</span>';
                                }
                            @endphp
                        </li>
                        <li class="list-group-item">
                            <strong>Tanggal Permohonan:</strong>
                            {{ \Carbon\Carbon::parse($reservation->created_at)->format('d F Y H:i') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Jenis Pemakaman:</strong> {{ ucfirst($reservation->burial_type) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Lokasi TPU:</strong> {{ $reservation->cemetery_name ?? '-' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Agama:</strong> {{ $reservation->religion_name ?? '-' }}
                        </li>
                    </ul>

                    {{-- Tombol Aksi --}}
                    <div class="mt-4 d-flex justify-content-between">
                        {{-- Contoh Tombol untuk Update Status (Misalnya ke Disetujui/Ditolak) --}}
                        <button type="button" class="btn btn-sm btn-success me-2" data-bs-toggle="modal"
                            data-bs-target="#updateStatusModal">
                            Update Status
                        </button>


                    </div>
                </div>
            </div>
        </div>

        {{-- Data Almarhum --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white">Data Almarhum</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nama:</strong> {{ $reservation->deceased_name ?? '-' }}</li>
                        <li class="list-group-item"><strong>No. KTP:</strong> {{ $reservation->deceased_ktp ?? '-' }}</li>
                        <li class="list-group-item"><strong>Jenis Kelamin:</strong>
                            {{ $reservation->deceased_gender == 'L' ? 'Laki-laki' : ($reservation->deceased_gender == 'P' ? 'Perempuan' : '-') }}
                        </li>
                        <li class="list-group-item">
                            <strong>TTL:</strong>
                            {{ ($reservation->place_of_birth ?? '-') . ', ' . ($reservation->date_of_birth ? \Carbon\Carbon::parse($reservation->date_of_birth)->format('d F Y') : '-') }}
                        </li>
                        <li class="list-group-item"><strong>Tanggal Wafat:</strong>
                            {{ $reservation->date_of_death ? \Carbon\Carbon::parse($reservation->date_of_death)->format('d F Y') : '-' }}
                        </li>
                        <li class="list-group-item"><strong>Tanggal Pemakaman:</strong>
                            {{ $reservation->burial_date ? \Carbon\Carbon::parse($reservation->burial_date)->format('d F Y') : '-' }}
                        </li>
                        <li class="list-group-item"><strong>Alamat:</strong> {{ $reservation->deceased_address ?? '-' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Wilayah:</strong> {{ $reservation->deceased_subdistrict_name ?? '-' }}
                            ({{ $reservation->deceased_district_name ?? '-' }})
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Data Ahli Waris --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white">Data Ahli Waris</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nama:</strong> {{ $reservation->heir_name ?? '-' }}</li>
                        <li class="list-group-item"><strong>No. KTP:</strong> {{ $reservation->heir_ktp ?? '-' }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $reservation->heir_email ?? '-' }}</li>
                        <li class="list-group-item"><strong>Telepon:</strong> {{ $reservation->heir_phone ?? '-' }}</li>
                        <li class="list-group-item"><strong>Pekerjaan:</strong> {{ $reservation->heir_occupation ?? '-' }}
                        </li>
                        <li class="list-group-item"><strong>Alamat:</strong> {{ $reservation->heir_address ?? '-' }}</li>
                        <li class="list-group-item">
                            <strong>Wilayah:</strong> {{ $reservation->heir_subdistrict_name ?? '-' }}
                            ({{ $reservation->heir_district_name ?? '-' }})
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Lampiran Dokumen --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white">Lampiran Dokumen</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Klik untuk mengunduh dokumen. Pastikan `php artisan storage:link` sudah
                        dijalankan.</p>
                    <div class="list-group">
                        <a href="{{ $reservation->file_deceased_ktp ? Storage::url($reservation->file_deceased_ktp) : '#' }}"
                            target="_blank"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $reservation->file_deceased_ktp ? '' : 'disabled' }}">
                            KTP Almarhum
                            @if ($reservation->file_deceased_ktp)
                                <span class="badge bg-success rounded-pill"><i class="mdi mdi-download"></i> Buka</span>
                            @else
                                <span class="badge bg-danger rounded-pill">Tidak Ada</span>
                            @endif
                        </a>
                        <a href="{{ $reservation->file_heir_ktp ? Storage::url($reservation->file_heir_ktp) : '#' }}"
                            target="_blank"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $reservation->file_heir_ktp ? '' : 'disabled' }}">
                            KTP Ahli Waris
                            @if ($reservation->file_heir_ktp)
                                <span class="badge bg-success rounded-pill"><i class="mdi mdi-download"></i> Buka</span>
                            @else
                                <span class="badge bg-danger rounded-pill">Tidak Ada</span>
                            @endif
                        </a>
                        <a href="{{ $reservation->file_death_certificate ? Storage::url($reservation->file_death_certificate) : '#' }}"
                            target="_blank"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $reservation->file_death_certificate ? '' : 'disabled' }}">
                            Surat Keterangan Kematian
                            @if ($reservation->file_death_certificate)
                                <span class="badge bg-success rounded-pill"><i class="mdi mdi-download"></i> Buka</span>
                            @else
                                <span class="badge bg-danger rounded-pill">Tidak Ada</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Status (Contoh) --}}
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Ubah Status Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.reservation.update_status', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new_status" class="form-label">Status Baru</label>
                            <select class="form-select" id="new_status" name="status" required>
                                <option value="0" {{ $reservation->status == 0 ? 'selected' : '' }}>Menunggu
                                    Verifikasi</option>
                                <option value="1" {{ $reservation->status == 1 ? 'selected' : '' }}>Disetujui
                                </option>
                                <option value="2" {{ $reservation->status == 2 ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
