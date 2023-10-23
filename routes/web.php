<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CountController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\GalerinController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\UserGuruController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserSiswaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\InformasiKegiatanController;

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
Route::get('/informasi-kegiatan/{slug}', [LandingPageController::class, 'informasi_kegiatan_detail'])->name('informasi_kegiatan.detail');
Route::get('/informasi-kegiatan', [LandingPageController::class, 'informasi_kegiatan'])->name('informasi_kegiatan');
Route::get('/galeri', [LandingPageController::class, 'galeri'])->name('galeri');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/count_countan', [CountController::class, 'index'])->name('count_countan');

    Route::group(['prefix' => 'user'], function () {
        Route::resource('/admin', UserAdminController::class)->names([
            'index'   => 'admin.user.admin',
            'create'  => 'admin.user.admin.create',
            'store'   => 'admin.user.admin.store',
            'edit'    => 'admin.user.admin.edit',
            'update'  => 'admin.user.admin.update',
            'destroy' => 'admin.user.admin.destroy',
        ]);
        Route::get('/admin/reset/{id}', [UserAdminController::class, 'reset'])->name('admin.user.admin.reset');
        Route::patch('/admin/reset/{id}', [UserAdminController::class, 'reset_password'])->name('admin.user.admin.reset_password');

        Route::resource('/siswa', UserSiswaController::class)->names([
            'index'   => 'admin.user.siswa',
            'create'  => 'admin.user.siswa.create',
            'store'   => 'admin.user.siswa.store',
            'edit'    => 'admin.user.siswa.edit',
            'update'  => 'admin.user.siswa.update',
            'destroy' => 'admin.user.siswa.destroy',
        ]);
        Route::get('/siswa/reset/{id}', [UserSiswaController::class, 'reset'])->name('admin.user.siswa.reset');
        Route::patch('/siswa/reset/{id}', [UserSiswaController::class, 'reset_password'])->name('admin.user.siswa.reset_password');

        Route::resource('/guru', UserGuruController::class)->names([
            'index'   => 'admin.user.guru',
            'create'  => 'admin.user.guru.create',
            'store'   => 'admin.user.guru.store',
            'edit'    => 'admin.user.guru.edit',
            'update'  => 'admin.user.guru.update',
            'destroy' => 'admin.user.guru.destroy',
        ]);
        Route::get('/guru/reset/{id}', [UserGuruController::class, 'reset'])->name('admin.user.guru.reset');
        Route::patch('/guru/reset/{id}', [UserGuruController::class, 'reset_password'])->name('admin.user.guru.reset_password');
    });

    Route::resource('/informasi_kegiatan', InformasiKegiatanController::class)->names([
        'index'   => 'admin.informasi_kegiatan',
        'create'  => 'admin.informasi_kegiatan.create',
        'store'   => 'admin.informasi_kegiatan.store',
        'edit'    => 'admin.informasi_kegiatan.edit',
        'update'  => 'admin.informasi_kegiatan.update',
        'destroy' => 'admin.informasi_kegiatan.destroy',
    ]);

    Route::resource('/galeri', GalerinController::class)->names([
        'index'   => 'admin.galeri',
        'create'  => 'admin.galeri.create',
        'store'   => 'admin.galeri.store',
        'edit'    => 'admin.galeri.edit',
        'update'  => 'admin.galeri.update',
        'destroy' => 'admin.galeri.destroy',
    ]);

    Route::resource('/mapel', MapelController::class)->names([
        'index'   => 'admin.mapel',
        'create'  => 'admin.mapel.create',
        'store'   => 'admin.mapel.store',
        'edit'    => 'admin.mapel.edit',
        'update'  => 'admin.mapel.update',
        'destroy' => 'admin.mapel.destroy',
    ]);

    Route::resource('/bank_soal', BankSoalController::class)->names([
        'index'   => 'admin.bank_soal',
        'create'  => 'admin.bank_soal.create',
        'store'   => 'admin.bank_soal.store',
        'edit'    => 'admin.bank_soal.edit',
        'update'  => 'admin.bank_soal.update',
        'destroy' => 'admin.bank_soal.destroy',
    ]);

    Route::post('/store_pg', [BankSoalController::class, 'store_pg'])->name('store_pg');
    Route::delete('/destroy_pg', [BankSoalController::class, 'destroy_pg'])->name('destroy_pg');

    Route::post('/store_essay', [BankSoalController::class, 'store_essay'])->name('store_essay');
    Route::delete('/destroy_essay', [BankSoalController::class, 'destroy_essay'])->name('destroy_essay');
});

Route::group(['prefix' => 'siswa', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');

    Route::get('/ujian', [UjianController::class, 'index'])->name('siswa.ujian');
    Route::get('/ujian/show/{slug}', [UjianController::class, 'show'])->name('siswa.ujian.show');
    Route::post('/ujian/store', [UjianController::class, 'store'])->name('siswa.ujian.store');
});

Route::post('/informasi_kegiatan/upload', [InformasiKegiatanController::class, 'upload'])->name('informasi_kegiatan.upload');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});
