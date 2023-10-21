<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/profil-sekolah', [LandingPageController::class, 'profil_sekolah'])->name('profil_sekolah');
Route::get('/informasi-kegiatan', [LandingPageController::class, 'informasi_kegiatan'])->name('informasi_kegiatan');
Route::get('/galeri', [LandingPageController::class, 'galeri'])->name('galeri');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
