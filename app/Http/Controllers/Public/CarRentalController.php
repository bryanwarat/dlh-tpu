<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CarRental;
use App\Models\Cemetery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CarRentalController extends Controller
{
    /**
     * Tampilkan form pemesanan mobil jenazah
     */
    public function index()
    {
        $cemeteries = Cemetery::orderBy('name', 'asc')->get();

        return view('pages.public.car_rental', compact('cemeteries'));
    }

    /**
     * Simpan pemesanan mobil jenazah
     */
    public function store(Request $request)
    {
        $request->validate([
            'cemetery_id'         => 'required|integer|exists:cemeteries,id',
            'requester_name'      => 'required|string|max:255',
            'phone'               => 'required|string|max:20',
            'is_intercity'        => 'nullable|boolean',
            'pickup_address'      => 'required|string',
            'destination_address' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            CarRental::create([
                'cemetery_id'        => $request->cemetery_id,
                'requester_name'     => $request->requester_name,
                'phone'              => $request->phone,
                'is_intercity'       => $request->is_intercity ?? 0,
                'pickup_address'     => $request->pickup_address,
                'destination_address'=> $request->destination_address,
                'status'             => 0, // default: menunggu verifikasi
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Pemesanan mobil jenazah berhasil diajukan, silakan menunggu verifikasi.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
