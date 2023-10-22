<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserAdminController;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

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
    });
});
