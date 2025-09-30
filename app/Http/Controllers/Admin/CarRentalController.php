<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarRental;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class CarRentalController extends Controller
{
    public function index()
    {
        return view('pages.admin.car_rental.index');
    }

    public function data(Request $request)
    {
        $query = CarRental::query()
            ->select('car_rentals.*')
            ->leftJoin('cemeteries as c', 'car_rentals.cemetery_id', '=', 'c.id')
            ->selectRaw('c.name as cemetery_name')
            ->orderBy('car_rentals.id', 'desc');

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
            ->addColumn('out_of_town_status', function ($row) {
                return $row->is_out_of_town ? '<span class="badge bg-info">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>';
            })
            ->addColumn('action', function ($row) {
                $detailUrl = route('admin.carrental.detail', $row->id);
                // Menggunakan ID untuk trigger SweetAlert atau modal kustom untuk DELETE
                return '
                    <a href="' . $detailUrl . '" class="btn btn-sm btn-info">
                        <i class="mdi mdi-eye"></i> Detail
                    </a>
                    
                ';
            })
            ->rawColumns(['status_badge', 'out_of_town_status', 'action'])
            ->make(true);
    }

    public function detail($id)
    {
        $carRental = CarRental::query()
            ->select('car_rentals.*')
            ->leftJoin('cemeteries as c', 'car_rentals.cemetery_id', '=', 'c.id')
            ->selectRaw('c.name as cemetery_name')
            ->where('car_rentals.id', $id)
            ->first();

        if (!$carRental) {
            abort(404, 'Pemesanan mobil jenazah tidak ditemukan');
        }

        return view('pages.admin.car_rental.detail', compact('carRental'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2', // 0: Menunggu, 1: Disetujui, 2: Ditolak
        ]);

        try {
            $carRental = CarRental::findOrFail($id);
            $carRental->status = $request->status;
            $carRental->save();

            return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Car Rental Status Update Failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui status: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = CarRental::destroy($id);

            if ($deleted) {
                return redirect()->route('admin.carrental.index')->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->route('admin.carrental.index')->with('error', 'Data gagal dihapus atau tidak ditemukan.');
            }
        } catch (\Exception $e) {
            \Log::error('Admin Car Rental Destroy Failed: ' . $e->getMessage());
            return redirect()->route('admin.carrental.index')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
