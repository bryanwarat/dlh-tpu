<?php

namespace App\Http\Controllers\Public;

use App\Models\Cemetery;
use App\Models\District;
use App\Models\Religion;
use App\Models\Reservation;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $request->validate([
            // Bagian Administrasi
            'cemetery_id' => 'required|exists:cemetery,id',
            'type' => 'required|in:Biasa,Tumpang',
            'religion_id' => 'required|exists:religion,id',

            // Data Meninggal Dunia
            'deceased_name' => 'required|string|max:255',
            'deceased_ktp' => 'required|string|max:50',
            'deceased_gender' => 'required|in:Laki-laki,Perempuan',
            'deceased_birthplace' => 'required|string|max:100',
            'deceased_birthdate' => 'required|date',
            'deceased_deathdate' => 'required|date',
            'deceased_burialdate' => 'required|date',
            'deceased_address' => 'required|string',
            'deceased_district_id' => 'required|exists:district,id',
            'deceased_subdistrict_id' => 'required|exists:subdistrict,id',

            // Data Ahli Waris
            'heir_name' => 'required|string|max:255',
            'heir_ktp' => 'required|string|max:50',
            'heir_email' => 'nullable|email',
            'heir_phone' => 'required|string|max:20',
            'heir_job' => 'nullable|string|max:100',
            'heir_address' => 'required|string',
            'heir_district_id' => 'required|exists:district,id',
            'heir_subdistrict_id' => 'required|exists:subdistrict,id',

            // Lampiran
            'file_ktp_deceased' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_ktp_heir' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_death_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $reservation = new Reservation();
        $reservation->fill($request->except(['file_ktp_deceased', 'file_ktp_heir', 'file_death_certificate']));

        // upload files
        if ($request->hasFile('file_ktp_deceased')) {
            $reservation->file_ktp_deceased = $request->file('file_ktp_deceased')->store('uploads/ktp_deceased');
        }
        if ($request->hasFile('file_ktp_heir')) {
            $reservation->file_ktp_heir = $request->file('file_ktp_heir')->store('uploads/ktp_heir');
        }
        if ($request->hasFile('file_death_certificate')) {
            $reservation->file_death_certificate = $request->file('file_death_certificate')->store('uploads/death_certificate');
        }

        $reservation->save();

        return redirect()->back()->with('success', 'Permohonan pemakaman berhasil diajukan.');
    }

    public function getSubdistricts($districtId)
    {
        $subdistricts = DB::table('subdistricts')
            ->where('district_id', $districtId)
            ->get(['id', 'name']);

        return response()->json($subdistricts);
    }
}
