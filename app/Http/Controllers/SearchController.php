<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Fasilitas;
use App\Models\Prestasi;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Pencarian di model Berita
        $berita = Berita::where('judul_berita', 'like', "%{$query}%")
                        ->orWhere('deskripsi', 'like', "%{$query}%")
                        ->get();

        // Pencarian di model Ekskul
        $ekskul = Ekskul::where('nama_ekskul', 'like', "%{$query}%")
                        ->orWhere('deskripsi', 'like', "%{$query}%")
                        ->get();

        // Pencarian di model Fasilitas
        $fasilitas = Fasilitas::where('nama', 'like', "%{$query}%")
                              ->orWhere('kategori', 'like', "%{$query}%")
                              ->get();

        // Pencarian di model Prestasi
        $prestasi = Prestasi::where('nama_siswa', 'like', "%{$query}%")
                            ->orWhere('nama_prestasi', 'like', "%{$query}%")
                            ->get();

        return view('search.results', compact('query', 'berita', 'ekskul', 'fasilitas', 'prestasi'));
    }
}
