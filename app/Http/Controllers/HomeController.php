<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; 
use App\Models\Fasilitas;
use App\Models\Ekskul;
use App\Models\Prestasi;
use App\Models\PPDB;
use App\Models\VisiMisi;
use App\Models\Ptk;
use App\Models\StrukturOrganisasi;

class HomeController extends Controller
{
    public function index() {
        $berita = Berita::latest()->take(6)->get(); // 3 berita terbaru di homepage
        return view('homepage', compact('berita'));
    }

    public function beritasekolah() {
        $berita = Berita::latest()->paginate(10); // semua berita untuk user
        return view('beritasekolah', compact('berita'));
    }

    // Tambahkan method baru untuk menampilkan detail berita
    public function showBerita($id) {
        $berita = Berita::findOrFail($id); // cari berita berdasarkan id, jika tidak ditemukan 404
        return view('beritadeskripsi', compact('berita')); // kirim data ke view berita_detail.blade.php
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
