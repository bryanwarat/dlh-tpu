<?php

namespace App\Http\Controllers\Public;

use App\Models\Cemetery;
use App\Models\District;
use App\Models\Religion;
use App\Models\Reservation;
use App\Models\Subdistrict;
use App\Models\Deceased; 
use App\Models\Heir;    
use App\Models\Attachment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Exception;

class ReservationController extends Controller
{
    public function index()
    {
        $cemeteries = Cemetery::where('status', 1)->get();
        $religions = Religion::all();
        $districts = District::all();

        return view('pages.public.reservation', compact('cemeteries', 'religions', 'districts'));
    }

    public function store(Request $request)
    {
        // --- 1. VALIDASI DATA ---
        $request->validate([
            // Bagian Administrasi
            'cemetery_id' => 'required|exists:cemeteries,id', 
            'burial_type' => 'required|in:Biasa,Tumpang', 
            'religion_id' => 'required|exists:religions,id', 

            // Data Meninggal Dunia
            'deceased_name' => 'required|string|max:255',
            'deceased_ktp' => 'required|string|max:50',
            'deceased_gender' => 'required|in:Laki-laki,Perempuan',
            'deceased_birthplace' => 'required|string|max:100',
            'deceased_birthdate' => 'required|date',
            'deceased_deathdate' => 'required|date',
            'deceased_burialdate' => 'required|date|after_or_equal:deceased_deathdate',
            'deceased_address' => 'required|string',
            'deceased_district_id' => 'required|exists:districts,id', 
            'deceased_subdistrict_id' => 'required|exists:subdistricts,id', 

            // Data Ahli Waris
            'heir_name' => 'required|string|max:255',
            'heir_ktp' => 'required|string|max:50',
            'heir_email' => 'nullable|email',
            'heir_phone' => 'required|string|max:20',
            'heir_job' => 'nullable|string|max:100',
            'heir_address' => 'required|string',
            'heir_district_id' => 'required|exists:districts,id',
            'heir_subdistrict_id' => 'required|exists:subdistricts,id',

            // Lampiran
            'file_ktp_deceased' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_ktp_heir' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_death_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Mapping gender string ke integer (asumsi 1=Laki-laki, 2=Perempuan)
        $genderInt = $request->deceased_gender == 'Laki-laki' ? 1 : 2;

        // Inisialisasi path file (penting untuk rollback)
        $pathKtpDeceased = null;
        $pathKtpHeir = null;
        $pathDeathCertificate = null;

        DB::beginTransaction();
        try {
            // --- 2. SIMPAN DATA ALMARHUM (DECEASED) ---
            $deceased = Deceased::create([
                'district_id' => $request->deceased_district_id,
                'subdistrict_id' => $request->deceased_subdistrict_id,
                'name' => $request->deceased_name,
                'ktp' => $request->deceased_ktp,
                'gender' => $genderInt,
                'place_of_birth' => $request->deceased_birthplace,
                'date_of_birth' => $request->deceased_birthdate,
                'date_of_death' => $request->deceased_deathdate,
                'burial_date' => $request->deceased_burialdate,
                'address' => $request->deceased_address,
            ]);

            // --- 3. SIMPAN DATA AHLI WARIS (HEIR) ---
            $heir = Heir::create([
                'district_id' => $request->heir_district_id,
                'subdistrict_id' => $request->heir_subdistrict_id,
                'name' => $request->heir_name,
                'ktp' => $request->heir_ktp,
                'email' => $request->heir_email,
                'phone' => $request->heir_phone,
                'occupation' => $request->heir_job, 
                'address' => $request->heir_address,
            ]);

            // --- 4. SIMPAN DATA PEMESANAN (RESERVATION) ---
            $reservation = Reservation::create([
                'deceased_id' => $deceased->id,
                'heir_id' => $heir->id,
                'religion_id' => $request->religion_id,
                'cemetery_id' => $request->cemetery_id, 
                'burial_type' => $request->burial_type, 
                'status' => 0, 
            ]);

            // --- 5. UPLOAD FILE & SIMPAN DATA LAMPIRAN (ATTACHMENTS) ---
            // Simpan path ke variabel sebelum disimpan ke DB.
            $pathKtpDeceased = $request->file('file_ktp_deceased')->store('attachments/ktp_deceased', 'public');
            $pathKtpHeir = $request->file('file_ktp_heir')->store('attachments/ktp_heir', 'public');
            $pathDeathCertificate = $request->file('file_death_certificate')->store('attachments/death_certificate', 'public');

            Attachment::create([
                'reservation_id' => $reservation->id,
                'deceased_ktp' => $pathKtpDeceased,
                'heir_ktp' => $pathKtpHeir,
                'death_certificate' => $pathDeathCertificate,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Permohonan pemakaman berhasil diajukan dan sedang menunggu verifikasi. Anda akan dihubungi setelah verifikasi selesai.');

        } catch (Exception $e) { 
            DB::rollBack();

            // Opsional: Hapus file yang mungkin sudah terupload sebelum transaksi gagal
            if ($pathKtpDeceased && Storage::disk('public')->exists($pathKtpDeceased)) {
                Storage::disk('public')->delete($pathKtpDeceased);
            }
            if ($pathKtpHeir && Storage::disk('public')->exists($pathKtpHeir)) {
                Storage::disk('public')->delete($pathKtpHeir);
            }
            if ($pathDeathCertificate && Storage::disk('public')->exists($pathDeathCertificate)) {
                Storage::disk('public')->delete($pathDeathCertificate);
            }

            // Logging error secara penuh
            \Log::error('Public Reservation Failed: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            
            // Jika APP_DEBUG mati (Production), kembalikan pesan user-friendly
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses permohonan. Silakan coba lagi.');
        }
    }

    public function getSubdistricts($districtId)
    {
        // Menggunakan Eloquent model yang sudah di-import
        $subdistricts = Subdistrict::where('district_id', $districtId)->get(['id', 'name']);
        return response()->json($subdistricts);
    }
}
