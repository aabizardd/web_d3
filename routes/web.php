<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JafungController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontEndController;
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

Route::get('/', [FrontEndController::class, 'index']);
Route::get('tugas', [FrontEndController::class, 'tugas'])->name('tugas');
Route::get('renstra', [FrontEndController::class, 'renstra'])->name('renstra');
Route::get('profil_deputi', [FrontEndController::class, 'profil_deputi'])->name('profil_deputi');
Route::get('struktur_organisasi', [FrontEndController::class, 'struktur_organisasi'])->name('struktur_organisasi');
Route::get('berita', [FrontEndController::class, 'berita'])->name('berita');
Route::get('analisis_kebijakan', [FrontEndController::class, 'analisis_kebijakan'])->name('analisis_kebijakan');

Route::get('regulasi', [FrontEndController::class, 'regulasi'])->name('regulasi');
Route::get('pustaka', [FrontEndController::class, 'pustaka'])->name('pustaka');
Route::get('artikel', [FrontEndController::class, 'artikel'])->name('artikel');


//Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'check_login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    
    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    //kelola pengguna
    Route::get('pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna');
    Route::post('pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna');
    Route::post('ubah_pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.ubah_pengguna');
    Route::get('hapus_pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.hapus_pengguna');
    //------

    //kelola berita
    Route::get('berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::post('berita', [BeritaController::class, 'store'])->name('admin.berita');
    Route::post('update_berita/{id}', [BeritaController::class, 'update'])->name('admin.update_berita');
    Route::get('hapus_berita/{id}', [BeritaController::class, 'destroy'])->name('admin.hapus_berita');
    //------

    //jafung
    Route::prefix('jafung')->group(function () {

        Route::get('regulasi', [JafungController::class, 'regulasi'])->name('admin.regulasi');

        Route::post('regulasi', [JafungController::class, 'add_regulasi'])->name('admin.regulasi');
        Route::get('hapus_regulasi/{id}', [JafungController::class, 'hapus_regulasi'])->name('admin.hapus_regulasi');

    });
    
});