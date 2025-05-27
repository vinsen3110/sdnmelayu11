<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; 

class HomeController extends Controller
{
    public function index() {
        $berita = Berita::latest()->take(3)->get(); // 3 berita terbaru di homepage
        return view('homepage', compact('berita'));
    }

    public function beritasekolah() {
        $berita = Berita::latest()->paginate(10); // semua berita untuk user
        return view('beritasekolah', compact('berita'));
    }

    public function visimisi() {
        return view('visimisi');
    }

    public function strukturorganisasi() {
        return view('strukturorganisasi');
    }

    public function pengumumanppdb() {
        return view('pengumumanppdb');
    }

    public function prestasisiswa() {
        return view('prestasisiswa');
    }
}
