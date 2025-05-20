<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\AuthController;

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
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/visimisi', [HomeController::class, 'visimisi'])->name('visimisi');
Route::get('/strukturorganisasi', [HomeController::class, 'strukturorganisasi'])->name('strukturorganisasi');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
Route::get('/admin/ekskul', [EkskulController::class, 'index'])->name('ekskul');
Route::post('/admin/ekskul', [EkskulController::class, 'store'])->name('ekskul.store');
Route::get('/admin/ekskul/{id}/edit', [EkskulController::class, 'edit'])->name('ekskul.edit');
Route::delete('/admin/ekskul/{id}', [EkskulController::class, 'destroy'])->name('ekskul.destroy');
Route::put('/admin/ekskul/{id}', [EkskulController::class, 'update'])->name('ekskul.update');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


