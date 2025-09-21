<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cemetery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CemeteryController extends Controller
{
    public function index()
    {
        return view('pages.admin.cemetery.index');
    }

    public function cemeteriesData(Request $request)
    {
        if ($request->ajax()) {
            $data = Cemetery::select(['id', 'name', 'address', 'status']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $detailUrl = route('admin.cemetery.detail', $row->id);
                    $editUrl = route('admin.cemetery.edit', $row->id);
                    return '
                        <a href="'.$detailUrl.'" class="btn btn-info btn-sm me-1">
                            <i class="mdi mdi-eye"></i> Detail
                        </a>
                        <a href="'.$editUrl.'" class="btn btn-warning btn-sm">
                            <i class="mdi mdi-pencil"></i> Edit
                        </a>
                    ';
                })
                ->rawColumns(['action']) // Hanya untuk kolom action
                ->make(true);
        }
        return response()->json(['error' => 'Not Ajax'], 400);
    }

    public function create()
    {
        return view('pages.admin.cemetery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'status'    => 'required',
            'address'   => 'nullable|string',
            'latitude'  => 'nullable',
            'longitude' => 'nullable',
        ]);

        try {
            Cemetery::create($validated);

            return redirect()
                ->route('admin.cemetery.create')
                ->with('success', 'Data TPU berhasil ditambahkan!');
        } catch (\Exception $e) {
            // simpan log error
            \Log::error('Cemetery Store Error: '.$e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $cemetery = Cemetery::findOrFail($id);
        return view('pages.admin.cemetery.edit', compact('cemetery'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'status'    => 'required',
            'address'   => 'nullable|string',
            'latitude'  => 'nullable',
            'longitude' => 'nullable',
        ]);

        try {
            $cemetery = Cemetery::findOrFail($id);
            $cemetery->update($validated);

            return redirect()
                ->route('admin.cemetery.edit', $id)
                ->with('success', 'Data TPU berhasil diperbarui!');
        } catch (\Exception $e) {
            // simpan log error
            \Log::error('Cemetery Update Error: '.$e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');
        }
    }

    public function detail($id)
    {
        $cemetery = Cemetery::findOrFail($id);
        return view('pages.admin.cemetery.detail', compact('cemetery'));
    }
}
