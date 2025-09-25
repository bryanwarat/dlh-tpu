@extends('layouts.public.app')

@section('content')
    <div class="container">
        <h2 class="mt-3">Form Pemakaman Baru</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- ================= ADMINISTRASI ================= -->
            <h4 class="mt-3">ADMINISTRASI</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Lokasi TPU</label>
                    <select name="tpu_id" class="form-select" required>
                        <option value="">Pilih TPU</option>
                        @foreach ($cemeteries as $cemetery)
                            <option value="{{ $cemetery->id }}">{{ $cemetery->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Jenis Pemakaman</label>
                    <select name="burial_type" class="form-select" required>
                        <option value="umum">Umum</option>
                        <option value="keluarga">Keluarga</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Agama</label>
                    <select name="religion_id" class="form-select" required>
                        <option value="">Pilih Agama</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Ket. Kurang Mampu</label>
                    <input type="text" name="poor_note" class="form-control">
                </div>
            </div>

            <!-- ================= DATA YANG MENINGGAL DUNIA ================= -->
            <h4>DATA YANG MENINGGAL DUNIA</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama</label>
                    <input type="text" name="deceased_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Binti</label>
                    <input type="text" name="deceased_binti" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>No. KTP</label>
                    <input type="text" name="deceased_ktp" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jenis Kelamin</label><br>
                    <select name="gender" class="form-select" required>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tempat/Tanggal Lahir</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meninggal Hari/Tanggal</label>
                    <input type="date" name="date_of_death" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Dimakamkan/Tanggal</label>
                    <input type="date" name="burial_date" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Alamat</label>
                    <textarea name="deceased_address" class="form-control"></textarea>
                </div>
            </div>

            <!-- ================= DATA AHLI WARIS ================= -->
            <h4>DATA AHLI WARIS</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama</label>
                    <input type="text" name="heir_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>No. KTP</label>
                    <input type="text" name="heir_ktp" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="heir_email" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>No. Telp</label>
                    <input type="text" name="heir_phone" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pekerjaan</label>
                    <input type="text" name="heir_occupation" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Alamat</label>
                    <textarea name="heir_address" class="form-control"></textarea>
                </div>
            </div>

            <!-- ================= LAMPIRAN ================= -->
            <h4>LAMPIRAN</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>File KTP Almarhum</label>
                    <input type="file" name="file_deceased_ktp" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>File KTP Ahli Waris</label>
                    <input type="file" name="file_heir_ktp" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>File Surat Kematian</label>
                    <input type="file" name="file_death_certificate" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Reservasi</button>
        </form>
    </div>
@endsection
