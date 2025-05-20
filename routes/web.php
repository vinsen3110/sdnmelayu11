<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
