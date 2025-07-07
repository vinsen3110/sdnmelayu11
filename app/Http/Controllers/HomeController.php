<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; 
use App\Models\Fasilitas;
use App\Models\Ekskul;
use App\Models\Prestasi;
use App\Models\Ppdb;
use App\Models\VisiMisi;
use App\Models\Ptk;
use App\Models\StrukturOrganisasi;
use App\Models\TentangKami;

class HomeController extends Controller
{
    public function index() {
        $berita = Berita::latest()->take(6)->get(); 
        return view('homepage', compact('berita'));
    }

    public function beritasekolah() {
        $berita = Berita::latest()->paginate(10); 
        return view('beritasekolah', compact('berita'));
    }

    public function showBerita($id) {
        $berita = Berita::findOrFail($id); 
        return view('beritadeskripsi', compact('berita')); 
    }

    public function tentang()
    {
    $tentangkami = TentangKami::all();
    return view('tentang', compact('tentangkami'));
    }

    public function visidanmisi()
    {
    $visimisi = VisiMisi::all();
    return view('visidanmisi', compact('visimisi'));
    }

    public function struktur()
    {
    $strukturorganisasi = strukturorganisasi::all(); 
    return view('struktur', compact('strukturorganisasi'));
    }

    public function dataptk()
    {
    $ptks = Ptk::all(); 
    return view('dataptk', compact('ptks'));
    }

    public function pengumumanPPDB()
    {
    $ppdb = PPDB::latest()->paginate(6);
    return view('pengumumanppdb', compact('ppdb'));
    }

    public function prestasisiswa()
    {
        $prestasi = Prestasi::latest()->paginate(9); // atau ->all(), bebas
        return view('prestasisiswa', compact('prestasi'));
    }

    public function kontak() {
        return view('kontak');
    }
    public function ekstrakulikuler() {
    $ekskul = Ekskul::all(); 
    return view('ekstrakulikuler', compact('ekskul')); 
    }
    public function fasilitassekolah() {
    $utama = Fasilitas::where('kategori', 'utama')->get();
    $pendukung = Fasilitas::where('kategori', 'pendukung')->get();
    return view('fasilitassekolah', compact('utama', 'pendukung'));
    }
}
