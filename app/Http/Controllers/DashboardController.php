<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Fasilitas;
use App\Models\Ppdb;
use App\Models\Prestasi;
use App\Models\Ptk;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahEkskul = Ekskul::count();
        $jumlahFasilitas = Fasilitas::count();
        $jumlahPpdb = Ppdb::count();
        $jumlahPrestasi = Prestasi::count();
        $jumlahPtk = Ptk::count();

        return view('admin.adm_dashboard', compact(
            'jumlahBerita',
            'jumlahEkskul',
            'jumlahFasilitas',
            'jumlahPpdb',
            'jumlahPrestasi',
            'jumlahPtk'
        ));
    }
}
