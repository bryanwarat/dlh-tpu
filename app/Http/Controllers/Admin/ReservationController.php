<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Deceased;
use App\Models\Heir;
use App\Models\Religion;
use App\Models\Cemetery;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.reservations.index');
    }

    public function data(Request $request)
    {
        $query = DB::table('reservations as r')
            ->leftJoin('deceaseds as d', 'r.deceased_id', '=', 'd.id')
            ->leftJoin('heirs as h', 'r.heir_id', '=', 'h.id')
            ->leftJoin('religions as rl', 'r.religion_id', '=', 'rl.id')
            ->leftJoin('cemeteries as c', 'r.cemetery_id', '=', 'c.id')
            ->select(
                'r.id',
                'r.burial_type',
                'r.status',
                'd.name as deceased_name',
                'h.name as heir_name',
                'rl.name as religion_name',
                'c.name as cemetery_name'
            )
            ->orderBy('r.id', 'desc');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $detailUrl = route('admin.reservation.detail', $row->id);
                $deleteUrl = route('admin.reservation.destroy', $row->id);

                return '
                    <a href="'.$detailUrl.'" class="btn btn-sm btn-info">
                        <i class="mdi mdi-eye"></i> Detail
                    </a>
                    <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;">
                        '.csrf_field().method_field('DELETE').'
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin hapus data ini?\')">
                            <i class="mdi mdi-delete"></i> Hapus
                        </button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function detail($id)
    {
        $reservation = DB::table('reservations as r')
            ->leftJoin('deceaseds as d', 'r.deceased_id', '=', 'd.id')
            ->leftJoin('heirs as h', 'r.heir_id', '=', 'h.id')
            ->leftJoin('religions as rl', 'r.religion_id', '=', 'rl.id')
            ->leftJoin('cemeteries as c', 'r.cemetery_id', '=', 'c.id')
            ->where('r.id', $id)
            ->select(
                'r.*',
                'd.name as deceased_name',
                'h.name as heir_name',
                'rl.name as religion_name',
                'c.name as cemetery_name'
            )
            ->first();

        if (!$reservation) {
            abort(404, 'Reservasi tidak ditemukan');
        }

        return view('pages.admin.reservation.detail', compact('reservation'));
    }

    public function destroy($id)
    {
        $deleted = DB::table('reservations')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.reservation.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('admin.reservation.index')->with('error', 'Data gagal dihapus.');
        }
    }
}
