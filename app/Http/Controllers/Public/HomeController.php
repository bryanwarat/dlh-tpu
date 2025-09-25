<?php

namespace App\Http\Controllers\Public;

use App\Models\Heir;
use App\Models\Cemetery;
use App\Models\Deceased;
use App\Models\Religion;
use App\Models\Attachment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $cemeteries = Cemetery::all();
        $religions  = Religion::all();

        return view('pages.public.reservation', compact('cemeteries', 'religions'));
    }


    public function store(Request $request)
    {
        // 1. Simpan data yang meninggal
        $deceased = Deceased::create([
            'name' => $request->deceased_name,
            'ktp' => $request->deceased_ktp,
            'gender' => $request->deceased_gender,
            'place_of_birth' => $request->deceased_place_of_birth,
            'date_of_birth' => $request->deceased_date_of_birth,
            'date_of_death' => $request->deceased_date_of_death,
            'burial_date' => $request->deceased_burial_date,
            'address' => $request->deceased_address,
        ]);

        // 2. Simpan data ahli waris
        $heir = Heir::create([
            'name' => $request->heir_name,
            'ktp' => $request->heir_ktp,
            'email' => $request->heir_email,
            'phone' => $request->heir_phone,
            'occupation' => $request->heir_occupation,
            'address' => $request->heir_address,
        ]);

        // 3. Simpan reservasi
        $reservation = Reservation::create([
            'deceased_id' => $deceased->id,
            'heir_id' => $heir->id,
            'religion_id' => $request->religion_id,
            'burial_type' => $request->burial_type,
            'status' => 0,
        ]);

        // 4. Simpan lampiran
        $attachment = new Attachment();
        $attachment->reservation_id = $reservation->id;

        if ($request->hasFile('file_deceased_ktp')) {
            $attachment->deceased_ktp = $request->file('file_deceased_ktp')->store('attachments');
        }
        if ($request->hasFile('file_heir_ktp')) {
            $attachment->heir_ktp = $request->file('file_heir_ktp')->store('attachments');
        }
        if ($request->hasFile('file_death_certificate')) {
            $attachment->death_certificate = $request->file('file_death_certificate')->store('attachments');
        }
        $attachment->save();

        return redirect()->back()->with('success', 'Pengajuan reservasi berhasil dikirim!');
    }
}
