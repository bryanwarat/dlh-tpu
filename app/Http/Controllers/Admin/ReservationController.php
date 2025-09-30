<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Deceased;
use App\Models\Heir;
use App\Models\Religion;
use App\Models\Cemetery;
use App\Models\Attachment;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    public function index()
    {
        return view('pages.admin.reservation.index');
    }

    public function data(Request $request)
    {
        // Menggunakan Eloquent untuk fleksibilitas yang lebih baik
        $query = Reservation::query()
            ->select('reservations.*')
            ->leftJoin('deceaseds as d', 'reservations.deceased_id', '=', 'd.id')
            ->leftJoin('heirs as h', 'reservations.heir_id', '=', 'h.id')
            ->leftJoin('religions as rl', 'reservations.religion_id', '=', 'rl.id')
            ->leftJoin('cemeteries as c', 'reservations.cemetery_id', '=', 'c.id')
            ->selectRaw('d.name as deceased_name, h.name as heir_name, rl.name as religion_name, c.name as cemetery_name')
            ->orderBy('reservations.id', 'desc');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('status_badge', function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge bg-success">Disetujui</span>';
                } elseif ($row->status == 0) {
                    return '<span class="badge bg-warning">Menunggu Verifikasi</span>';
                } else {
                    return '<span class="badge bg-danger">Ditolak</span>';
                }
            })
            ->addColumn('action', function ($row) {
                $detailUrl = route('admin.reservation.detail', $row->id);
                // Menggunakan ID untuk trigger SweetAlert atau modal kustom untuk DELETE
                return '
                    <a href="'.$detailUrl.'" class="btn btn-sm btn-info">
                        <i class="mdi mdi-eye"></i> Detail
                    </a>
                    
                ';
            })
            ->rawColumns(['status_badge', 'action'])
            ->make(true);
    }

    public function detail($id)
    {
        // Menggunakan Eloquent dengan select spesifik dan join ke semua tabel terkait
        $reservation = Reservation::select('reservations.*')
            // Data Deceased
            ->leftJoin('deceaseds as d', 'reservations.deceased_id', '=', 'd.id')
            ->leftJoin('districts as dd', 'd.district_id', '=', 'dd.id')
            ->leftJoin('subdistricts as dsd', 'd.subdistrict_id', '=', 'dsd.id')
            // Data Heir
            ->leftJoin('heirs as h', 'reservations.heir_id', '=', 'h.id')
            ->leftJoin('districts as hd', 'h.district_id', '=', 'hd.id')
            ->leftJoin('subdistricts as hsd', 'h.subdistrict_id', '=', 'hsd.id')
            // Data Lain
            ->leftJoin('religions as rl', 'reservations.religion_id', '=', 'rl.id')
            ->leftJoin('cemeteries as c', 'reservations.cemetery_id', '=', 'c.id')
            ->leftJoin('attachments as a', 'reservations.id', '=', 'a.reservation_id')
            ->where('reservations.id', $id)
            ->selectRaw('
                d.name as deceased_name, d.ktp as deceased_ktp, d.gender as deceased_gender, d.place_of_birth, d.date_of_birth, d.date_of_death, d.burial_date, d.address as deceased_address,
                dd.name as deceased_district_name, dsd.name as deceased_subdistrict_name,
                h.name as heir_name, h.ktp as heir_ktp, h.email as heir_email, h.phone as heir_phone, h.occupation as heir_occupation, h.address as heir_address,
                hd.name as heir_district_name, hsd.name as heir_subdistrict_name,
                rl.name as religion_name,
                c.name as cemetery_name,
                a.deceased_ktp as file_deceased_ktp, a.heir_ktp as file_heir_ktp, a.death_certificate as file_death_certificate
            ')
            ->first();

        if (!$reservation) {
            abort(404, 'Reservasi tidak ditemukan');
        }

        return view('pages.admin.reservation.detail', compact('reservation'));
    }

    /**
     * Memperbarui status reservasi (0=Menunggu, 1=Disetujui, 2=Ditolak).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            // Status harus salah satu dari 0, 1, atau 2
            'status' => 'required|in:0,1,2',
        ]);

        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->status = $request->status;
            $reservation->save();

            $statusMessage = [
                '0' => 'menunggu verifikasi',
                '1' => 'disetujui',
                '2' => 'ditolak',
            ];

            // Tampilkan SweetAlert notifikasi
            return redirect()->back()->with('success', 'Status reservasi berhasil diubah menjadi ' . $statusMessage[$request->status] . '.');

        } catch (\Exception $e) {
            \Log::error('Admin Reservation Status Update Failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui status reservasi.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $reservation = Reservation::findOrFail($id);
            
            // 1. Ambil data related ID
            $deceasedId = $reservation->deceased_id;
            $heirId = $reservation->heir_id;

            // 2. Hapus Lampiran dan file terkait
            $attachment = Attachment::where('reservation_id', $id)->first();
            if ($attachment) {
                // Hapus file dari storage
                if ($attachment->deceased_ktp && Storage::disk('public')->exists($attachment->deceased_ktp)) {
                    Storage::disk('public')->delete($attachment->deceased_ktp);
                }
                if ($attachment->heir_ktp && Storage::disk('public')->exists($attachment->heir_ktp)) {
                    Storage::disk('public')->delete($attachment->heir_ktp);
                }
                if ($attachment->death_certificate && Storage::disk('public')->exists($attachment->death_certificate)) {
                    Storage::disk('public')->delete($attachment->death_certificate);
                }
                $attachment->delete();
            }

            // 3. Hapus Reservasi
            $reservation->delete();

            // 4. Hapus Almarhum dan Ahli Waris
            Deceased::where('id', $deceasedId)->delete();
            Heir::where('id', $heirId)->delete();

            DB::commit();
            return redirect()->route('admin.reservation.index')->with('success', 'Data berhasil dihapus, termasuk data terkait.');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Admin Reservation Destroy Failed: ' . $e->getMessage());
            return redirect()->route('admin.reservation.index')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
