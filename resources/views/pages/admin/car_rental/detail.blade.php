@extends('layouts.admin.app')

@section('title', 'Detail Sewa Mobil Jenazah')
@section('meta_description', 'Detail pemesanan mobil jenazah')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Detail Pemesanan Mobil Jenazah #{{ $carRental->id }}</h4>
        </div>
        <div class="flex-shrink-0 mt-sm-0 mt-3">
            <a href="{{ route('admin.carrental.index') }}" class="btn btn-sm btn-light">Kembali ke Daftar</a>
        </div>
    </div>

    <div class="row">
        {{-- Status --}}
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Status Pemesanan</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        Status Saat Ini:
                        @if ($carRental->status == 1)
                            <span class="badge bg-success fs-14">Disetujui</span>
                        @elseif ($carRental->status == 0)
                            <span class="badge bg-warning fs-14">Menunggu Verifikasi</span>
                        @else
                            <span class="badge bg-danger fs-14">Ditolak</span>
                        @endif
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#updateStatusModal">
                        Ubah Status
                    </button>
                </div>
            </div>
        </div>

        {{-- Informasi Pemesan --}}
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi Pemesan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th>Nama Pemesan</th>
                            <td>{{ $carRental->requester_name }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $carRental->phone }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pemesanan</th>
                            <td>{{ $carRental->created_at->translatedFormat('d F Y, H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- Informasi Layanan --}}
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi Layanan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th>Pilihan TPU</th>
                            <td>{{ $carRental->cemetery_name }}</td>
                        </tr>
                        <tr>
                            <th>Pengantaran Luar Kota</th>
                            <td>
                                @if ($carRental->is_intercity)
                                    <span class="badge bg-info">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Tidak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Penjemputan</th>
                            <td>{{ $carRental->pickup_address }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Tujuan</th>
                            <td>{{ $carRental->destination_address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Status -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.carrental.update_status', $carRental->id) }}" method="POST"
                class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Status Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label for="status" class="form-label">Pilih Status Baru</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="0" {{ $carRental->status == 0 ? 'selected' : '' }}>0 - Menunggu Verifikasi
                        </option>
                        <option value="1" {{ $carRental->status == 1 ? 'selected' : '' }}>1 - Disetujui</option>
                        <option value="2" {{ $carRental->status == 2 ? 'selected' : '' }}>2 - Ditolak</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
