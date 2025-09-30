<?php

namespace App\Http\Controllers\Public;

use App\Models\Cemetery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CemeteryController extends Controller
{
     public function index()
    {
        // Ambil semua TPU dari database
        $cemeteries = Cemetery::orderBy('name', 'asc')->where('status', 1)->get();

        // Kirim ke view
        return view('pages.public.cemetery', compact('cemeteries'));
    }
}
