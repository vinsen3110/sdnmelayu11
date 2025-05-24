<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function berita() {
        return view('berita');
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
}
