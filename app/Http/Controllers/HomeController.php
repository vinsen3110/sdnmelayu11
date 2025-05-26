<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function beritasekolah() { 
        return view('beritasekolah');
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
