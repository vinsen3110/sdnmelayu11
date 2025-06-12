<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PpdbController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/beritasekolah', [HomeController::class, 'beritasekolah'])->name('beritasekolah');
Route::get('/berita/{id}', [HomeController::class, 'showBerita'])->name('berita.show');
Route::get('/visimisi', [HomeController::class, 'visimisi'])->name('visimisi');
Route::get('/strukturorganisasi', [HomeController::class, 'strukturorganisasi'])->name('strukturorganisasi');
Route::get('/pengumumanppdb', [HomeController::class, 'pengumumanppdb'])->name('pengumumanppdb');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/fasilitassekolah', [HomeController::class, 'fasilitassekolah'])->name('fasilitassekolah');
Route::get('/ekstrakulikuler', [HomeController::class, 'ekstrakulikuler'])->name('ekstrakulikuler');
Route::get('/prestasisiswa', [HomeController::class, 'prestasisiswa'])->name('prestasisiswa');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// search
Route::get('/search', [SearchController::class, 'index'])->name('search');

//ekskul
Route::get('/admin/ekskul', [EkskulController::class, 'index'])->name('ekskul')->middleware('auth');
Route::post('/admin/ekskul', [EkskulController::class, 'store'])->name('ekskul.store');
Route::get('/admin/ekskul/{id}/edit', [EkskulController::class, 'edit'])->name('ekskul.edit');
Route::delete('/admin/ekskul/{id}', [EkskulController::class, 'destroy'])->name('ekskul.destroy');
Route::put('/admin/ekskul/{id}', [EkskulController::class, 'update'])->name('ekskul.update');
//fasilitas
Route::get('/admin/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas')->middleware('auth');
Route::post('/admin/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
Route::get('/admin/fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
Route::delete('/admin/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
Route::put('/admin/fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
//Prestasi
Route::get('/admin/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index')->middleware('auth');
Route::post('/admin/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
Route::get('/admin/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
Route::delete('/admin/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');
Route::put('/admin/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
//Berita
Route::get('/admin/berita', [BeritaController::class, 'index'])->name('berita')->middleware('auth');
Route::post('/admin/berita/store', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.hapus');
//ppdb
Route::get('/admin/ppdb', [PpdbController::class, 'index'])->name('ppdb')->middleware('auth');
Route::post('/admin/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/admin/ppdb/{id}/edit', [PpdbController::class, 'edit'])->name('ppdb.edit');
Route::delete('/admin/ppdb/{id}', [PpdbController::class, 'destroy'])->name('ppdb.destroy');
Route::put('/admin/ppdb/{id}', [PpdbController::class, 'update'])->name('ppdb.update');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
