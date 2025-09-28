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
                                <h2>Pemakaman Baru</h2>
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
                        <form action="" method="POST" enctype="multipart/form-data" class="contact-form">
                            @csrf

                            <!-- 1. Administrasi -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Administrasi</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-6">
                                        <label>Lokasi TPU</label>
                                        <select name="cemetery_id" class="form-control">
                                            <option value="">-- Pilih TPU --</option>
                                            @foreach ($cemeteries as $cemetery)
                                                <option value="{{ $cemetery->id }}">{{ $cemetery->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis Pemakaman</label>
                                        <select name="burial_type" class="form-control">
                                            <option value="Biasa">Biasa</option>
                                            <option value="Tumpang">Tumpang</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Agama</label>
                                        <select name="religion_id" class="form-control">
                                            <option value="">-- Pilih Agama --</option>
                                            @foreach ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Data yang meninggal dunia -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Data Yang Meninggal Dunia</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-6">
                                        <label>Nama</label>
                                        <input type="text" name="deceased_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. KTP</label>
                                        <input type="text" name="deceased_ktp" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin</label>
                                        <select name="deceased_gender" class="form-control">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="deceased_birthplace" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="deceased_birthdate" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Meninggal</label>
                                        <input type="date" name="deceased_deathdate" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Dimakamkan</label>
                                        <input type="date" name="deceased_burialdate" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Alamat</label>
                                        <textarea name="deceased_address" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kecamatan</label>
                                        <select name="deceased_district_id" id="district" class="form-control">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kelurahan</label>
                                        <select name="deceased_subdistrict_id" id="subdistrict" class="form-control">
                                            <option value="">-- Pilih Kelurahan --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Data Ahli Waris -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Data Ahli Waris</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-6">
                                        <label>Nama</label>
                                        <input type="text" name="heir_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. KTP</label>
                                        <input type="text" name="heir_ktp" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="heir_email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. Telp</label>
                                        <input type="text" name="heir_phone" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="heir_job" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Alamat</label>
                                        <textarea name="heir_address" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kecamatan</label>
                                        <select name="heir_district_id" id="heir_district" class="form-control">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kelurahan</label>
                                        <select name="heir_subdistrict_id" id="heir_subdistrict" class="form-control">
                                            <option value="">-- Pilih Kelurahan --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Lampiran -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Lampiran</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-4">
                                        <label>KTP Almarhum</label>
                                        <input type="file" name="file_ktp_deceased" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>KTP Ahli Waris</label>
                                        <input type="file" name="file_ktp_heir" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Surat Kematian</label>
                                        <input type="file" name="file_death_certificate" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- form-area-end -->
    </main>

    <script>
        // JS sederhana untuk load kelurahan sesuai kecamatan
        document.getElementById('district').addEventListener('change', function() {
            let districtId = this.value;
            fetch(`/cemetery/get-subdistricts/${districtId}`)
                .then(res => res.json())
                .then(data => {
                    let subdistrictSelect = document.getElementById('subdistrict');
                    subdistrictSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
                    data.forEach(sub => {
                        subdistrictSelect.innerHTML += `<option value="${sub.id}">${sub.name}</option>`;
                    });
                });
        });

        document.getElementById('heir_district').addEventListener('change', function() {
            let districtId = this.value;
            fetch(`/cemetery/get-subdistricts/${districtId}`)
                .then(res => res.json())
                .then(data => {
                    let subdistrictSelect = document.getElementById('heir_subdistrict');
                    subdistrictSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
                    data.forEach(sub => {
                        subdistrictSelect.innerHTML += `<option value="${sub.id}">${sub.name}</option>`;
                    });
                });
        });
    </script>
@endsection
