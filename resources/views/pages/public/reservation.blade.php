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

                        {{-- Menampilkan Error Validasi Laravel standard --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> Ada beberapa kesalahan pada input Anda.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Alert standar error (digunakan jika SweetAlert gagal) --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- FORM ACTION DIARAHKAN KE CONTROLLER STORE -->
                        <form action="{{ route('public.reservation.store') }}" method="POST" enctype="multipart/form-data"
                            class="contact-form">
                            @csrf

                            <!-- 1. Administrasi -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>1. Administrasi</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-6">
                                        <label>Lokasi TPU <span class="text-danger">*</span></label>
                                        <select name="cemetery_id"
                                            class="form-control @error('cemetery_id') is-invalid @enderror">
                                            <option value="">-- Pilih TPU --</option>
                                            @foreach ($cemeteries as $cemetery)
                                                <option value="{{ $cemetery->id }}"
                                                    {{ old('cemetery_id') == $cemetery->id ? 'selected' : '' }}>
                                                    {{ $cemetery->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('cemetery_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis Pemakaman <span class="text-danger">*</span></label>
                                        <select name="burial_type"
                                            class="form-control @error('burial_type') is-invalid @enderror">
                                            <option value="Biasa" {{ old('burial_type') == 'Biasa' ? 'selected' : '' }}>
                                                Biasa
                                            </option>
                                            <option value="Tumpang" {{ old('burial_type') == 'Tumpang' ? 'selected' : '' }}>
                                                Tumpang
                                            </option>
                                        </select>
                                        @error('burial_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Agama <span class="text-danger">*</span></label>
                                        <select name="religion_id"
                                            class="form-control @error('religion_id') is-invalid @enderror">
                                            <option value="">-- Pilih Agama --</option>
                                            @foreach ($religions as $religion)
                                                <option value="{{ $religion->id }}"
                                                    {{ old('religion_id') == $religion->id ? 'selected' : '' }}>
                                                    {{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('religion_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Data yang meninggal dunia -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>2. Data Yang Meninggal Dunia</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-6">
                                        <label>Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="deceased_name" value="{{ old('deceased_name') }}"
                                            class="form-control @error('deceased_name') is-invalid @enderror">
                                        @error('deceased_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. KTP <span class="text-danger">*</span></label>
                                        <input type="text" name="deceased_ktp" value="{{ old('deceased_ktp') }}"
                                            class="form-control @error('deceased_ktp') is-invalid @enderror">
                                        @error('deceased_ktp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="deceased_gender"
                                            class="form-control @error('deceased_gender') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki"
                                                {{ old('deceased_gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ old('deceased_gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        @error('deceased_gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" name="deceased_birthplace"
                                            value="{{ old('deceased_birthplace') }}"
                                            class="form-control @error('deceased_birthplace') is-invalid @enderror">
                                        @error('deceased_birthplace')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" name="deceased_birthdate"
                                            value="{{ old('deceased_birthdate') }}"
                                            class="form-control @error('deceased_birthdate') is-invalid @enderror">
                                        @error('deceased_birthdate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Meninggal <span class="text-danger">*</span></label>
                                        <input type="date" name="deceased_deathdate"
                                            value="{{ old('deceased_deathdate') }}"
                                            class="form-control @error('deceased_deathdate') is-invalid @enderror">
                                        @error('deceased_deathdate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Dimakamkan <span class="text-danger">*</span></label>
                                        <input type="date" name="deceased_burialdate"
                                            value="{{ old('deceased_burialdate') }}"
                                            class="form-control @error('deceased_burialdate') is-invalid @enderror">
                                        @error('deceased_burialdate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Alamat <span class="text-danger">*</span></label>
                                        <textarea name="deceased_address" class="form-control @error('deceased_address') is-invalid @enderror">{{ old('deceased_address') }}</textarea>
                                        @error('deceased_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select name="deceased_district_id" id="deceased_district"
                                            class="form-control @error('deceased_district_id') is-invalid @enderror">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{ old('deceased_district_id') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('deceased_district_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kelurahan <span class="text-danger">*</span></label>
                                        <select name="deceased_subdistrict_id" id="deceased_subdistrict"
                                            class="form-control @error('deceased_subdistrict_id') is-invalid @enderror">
                                            <option value="{{ old('deceased_subdistrict_id') ?? '' }}">
                                                {{ old('deceased_subdistrict_name') ?? '-- Pilih Kelurahan --' }}</option>
                                            {{-- Opsi akan diisi oleh JS --}}
                                        </select>
                                        @error('deceased_subdistrict_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Data Ahli Waris -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>3. Data Ahli Waris</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-6">
                                        <label>Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="heir_name" value="{{ old('heir_name') }}"
                                            class="form-control @error('heir_name') is-invalid @enderror">
                                        @error('heir_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. KTP <span class="text-danger">*</span></label>
                                        <input type="text" name="heir_ktp" value="{{ old('heir_ktp') }}"
                                            class="form-control @error('heir_ktp') is-invalid @enderror">
                                        @error('heir_ktp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="heir_email" value="{{ old('heir_email') }}"
                                            class="form-control @error('heir_email') is-invalid @enderror">
                                        @error('heir_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. Telp <span class="text-danger">*</span></label>
                                        <input type="text" name="heir_phone" value="{{ old('heir_phone') }}"
                                            class="form-control @error('heir_phone') is-invalid @enderror">
                                        @error('heir_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="heir_job" value="{{ old('heir_job') }}"
                                            class="form-control @error('heir_job') is-invalid @enderror">
                                        @error('heir_job')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Alamat <span class="text-danger">*</span></label>
                                        <textarea name="heir_address" class="form-control @error('heir_address') is-invalid @enderror">{{ old('heir_address') }}</textarea>
                                        @error('heir_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select name="heir_district_id" id="heir_district"
                                            class="form-control @error('heir_district_id') is-invalid @enderror">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{ old('heir_district_id') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('heir_district_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kelurahan <span class="text-danger">*</span></label>
                                        <select name="heir_subdistrict_id" id="heir_subdistrict"
                                            class="form-control @error('heir_subdistrict_id') is-invalid @enderror">
                                            <option value="{{ old('heir_subdistrict_id') ?? '' }}">
                                                {{ old('heir_subdistrict_name') ?? '-- Pilih Kelurahan --' }}</option>
                                            {{-- Opsi akan diisi oleh JS --}}
                                        </select>
                                        @error('heir_subdistrict_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Lampiran -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>4. Lampiran (Maks. 2MB, format JPG, JPEG, PNG, PDF)</h5>
                                </div>
                                <div class="card-body row g-3">
                                    <div class="col-md-4">
                                        <label>KTP Almarhum <span class="text-danger">*</span></label>
                                        <input type="file" name="file_ktp_deceased"
                                            class="form-control @error('file_ktp_deceased') is-invalid @enderror">
                                        @error('file_ktp_deceased')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label>KTP Ahli Waris <span class="text-danger">*</span></label>
                                        <input type="file" name="file_ktp_heir"
                                            class="form-control @error('file_ktp_heir') is-invalid @enderror">
                                        @error('file_ktp_heir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label>Surat Kematian <span class="text-danger">*</span></label>
                                        <input type="file" name="file_death_certificate"
                                            class="form-control @error('file_death_certificate') is-invalid @enderror">
                                        @error('file_death_certificate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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

    {{-- CDN SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Mendapatkan base URL untuk AJAX
        const baseUrl = '{{ url('/') }}';

        // --- SweetAlert Notification Handler ---
        document.addEventListener('DOMContentLoaded', function() {
            // Cek jika ada notifikasi success
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif

            // Fungsi untuk menginisialisasi ulang select Kelurahan jika ada old input setelah kegagalan validasi
            const deceasedDistrictId = document.getElementById('deceased_district').value;
            const deceasedSubdistrictId = '{{ old('deceased_subdistrict_id') }}';
            if (deceasedDistrictId && deceasedSubdistrictId) {
                loadSubdistricts(deceasedDistrictId, 'deceased_subdistrict', deceasedSubdistrictId);
            }

            const heirDistrictId = document.getElementById('heir_district').value;
            const heirSubdistrictId = '{{ old('heir_subdistrict_id') }}';
            if (heirDistrictId && heirSubdistrictId) {
                loadSubdistricts(heirDistrictId, 'heir_subdistrict', heirSubdistrictId);
            }
        });

        // --- AJAX Subdistrict Loader ---

        /**
         * Fungsi untuk memuat data kelurahan (subdistricts) berdasarkan ID kecamatan (district)
         * @param {string} districtId - ID dari kecamatan yang dipilih
         * @param {string} targetSelectId - ID dari elemen select kelurahan yang akan diisi
         * @param {string|null} selectedId - ID kelurahan yang harus dipilih (untuk old input)
         */
        function loadSubdistricts(districtId, targetSelectId, selectedId = null) {
            const subdistrictSelect = document.getElementById(targetSelectId);
            subdistrictSelect.innerHTML = '<option value="">Memuat...</option>';

            if (!districtId) {
                subdistrictSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
                return;
            }

            fetch(`${baseUrl}/cemetery/get-subdistricts/${districtId}`)
                .then(res => res.json())
                .then(data => {
                    subdistrictSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
                    data.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.id;
                        option.textContent = sub.name;

                        // Cek apakah ada nilai old input yang cocok
                        if (sub.id == selectedId) {
                            option.selected = true;
                        }

                        subdistrictSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching subdistricts:', error);
                    subdistrictSelect.innerHTML = '<option value="">Gagal memuat kelurahan</option>';
                });
        }

        // Event listener untuk Kecamatan Almarhum
        document.getElementById('deceased_district').addEventListener('change', function() {
            loadSubdistricts(this.value, 'deceased_subdistrict');
        });

        // Event listener untuk Kecamatan Ahli Waris
        document.getElementById('heir_district').addEventListener('change', function() {
            loadSubdistricts(this.value, 'heir_subdistrict');
        });
    </script>
@endsection
