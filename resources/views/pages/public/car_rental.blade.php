@extends('layouts.public.app')

@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex align-items-center"
            style="background-image:url('{{ asset('assets/public/img/testimonial/test-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-wrap text-center">
                            <div class="breadcrumb-title mb-30">
                                <h2>Pemesanan Mobil Jenazah</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- form-area -->
        <section class="services-area services-bg services-two pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                        {{-- Menampilkan Error Validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> Ada beberapa kesalahan pada input Anda.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Alert standar error (fallback jika SweetAlert gagal) --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- FORM ACTION -->
                        <form action="{{ route('public.carrental.store') }}" method="POST" class="contact-form">
                            @csrf

                            <!-- 1. Data Pemesanan -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>1. Data Pemesanan</h5>
                                </div>
                                <div class="card-body row g-3">

                                    <div class="col-md-6">
                                        <label>Pilih TPU <span class="text-danger">*</span></label>
                                        <select name="cemetery_id"
                                            class="form-control @error('cemetery_id') is-invalid @enderror">
                                            <option value="">-- Pilih TPU --</option>
                                            @foreach ($cemeteries as $cemetery)
                                                <option value="{{ $cemetery->id }}"
                                                    {{ old('cemetery_id') == $cemetery->id ? 'selected' : '' }}>
                                                    {{ $cemetery->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('cemetery_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Nama Pemohon <span class="text-danger">*</span></label>
                                        <input type="text" name="requester_name" value="{{ old('requester_name') }}"
                                            class="form-control @error('requester_name') is-invalid @enderror">
                                        @error('requester_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>No. Telepon <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="{{ old('phone') }}"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Pengantaran Luar Kota?</label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check me-3">
                                                <input type="radio" name="is_intercity" value="1"
                                                    class="form-check-input"
                                                    {{ old('is_intercity') == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" checked name="is_intercity" value="0"
                                                    class="form-check-input"
                                                    {{ old('is_intercity') == '0' ? 'checked' : '' }}>
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        @error('is_intercity')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- 2. Alamat -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>2. Alamat</h5>
                                </div>
                                <div class="card-body row g-3">

                                    <div class="col-md-12">
                                        <label>Alamat Penjemputan <span class="text-danger">*</span></label>
                                        <textarea name="pickup_address" rows="3" class="form-control @error('pickup_address') is-invalid @enderror">{{ old('pickup_address') }}</textarea>
                                        @error('pickup_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label>Alamat Tujuan <span class="text-danger">*</span></label>
                                        <textarea name="destination_address" rows="3"
                                            class="form-control @error('destination_address') is-invalid @enderror">{{ old('destination_address') }}</textarea>
                                        @error('destination_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Notifikasi sukses
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif

            // Notifikasi error
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
@endsection
