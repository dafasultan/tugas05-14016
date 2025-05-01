<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use Illuminate\Support\Facades\Route;

// Halaman utama (beranda)
// Route::middleware('guest')->get('/', function () {
//     return view('poliklinik.beranda');
// });
Route::get('/', function () {
    return auth()->check()
        ? redirect('/dashboard') // atau route khusus user login
        : view('poliklinik.beranda'); // untuk guest
});

Route::get('/dashboard', fn() => view('poliklinik.beranda'));




// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// ---------------------------
// RBAC: Route untuk Dokter
// ---------------------------
// Route::middleware(['auth', 'role:dokter'])->group(function () {
//     // Route Dashboard Dokter
//     Route::get('/dokter', fn() => view('dokter.dashboard'));

//     // Route Periksa Pasien
//     Route::get('/dokter/periksa', [DokterController::class, 'periksa'])->name('dokter.periksa');

//     // Route untuk Obat
//     Route::get('/dokter/obat', [DokterController::class, 'obat'])->name('dokter.obat');

//     // Resource Route untuk Obat dan Pasien hanya untuk dokter
//     Route::resource('obat', ObatController::class)->names('obat');
//     Route::resource('pasiens', PasienController::class)->names('pasiens');
// });

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dokter', fn() => view('dokter.dashboard'))->name('dokter');
    Route::get('/dokter/periksa', [DokterController::class, 'periksa'])->name('dokter.periksa');
    Route::get('/dokter/obat', [ObatController::class, 'index'])->name('dokter.obat');
    Route::get('/periksas/{id}/diagnosa', [PeriksaController::class, 'edit']);
    Route::post('/periksas/{id}/diagnosa', [PeriksaController::class, 'diagnosaPost'])->name('periksas.diagnosaPost');

    // Resource route hanya untuk dokter
    Route::resource('obat', ObatController::class)->names('obat');
    Route::resource('pasiens', PasienController::class)->names('pasiens');
    Route::resource('periksas', PeriksaController::class)->names('periksas');
});



// ---------------------------
// RBAC: Route untuk Pasien
// ---------------------------
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', fn() => view('pasien.dashboard'))->name('pasien');
    Route::get('/pasien/periksa', [PeriksaController::class, 'periksaPasien'])->name('pasien.periksa');
    Route::post('/pasien/periksa', [PeriksaController::class, 'store'])->name('pasien.periksa.store');
    Route::get('/pasien/riwayat', [PasienController::class, 'pasienRiwayat'])->name('pasien.riwayat');
});
