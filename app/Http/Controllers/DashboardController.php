<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;
use App\Models\Fasilitas;
use App\Models\Ptk;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahEkskul = Ekskul::count();
        $jumlahFasilitas = Fasilitas::count();
        $jumlahPtk = Ptk::count();
        $jumlahPrestasi = Prestasi::count();

        return view('admin.adm_dashboard', compact(
            'jumlahEkskul',
            'jumlahFasilitas',
            'jumlahPtk',
            'jumlahPrestasi'
        ));
    }
}
