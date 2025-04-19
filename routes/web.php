<?php

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\DokterController;
// use App\Http\Controllers\ObatController;
// use App\Http\Controllers\PasienController;
// use Illuminate\Support\Facades\Route;

// Route::middleware('guest')->get('/', function () {
//     return view('poliklinik.beranda');
// });

// Route::middleware(['auth', 'role:dokter'])->get('/dokter', function () {
//     return view('dokter.dashboard');
// });

// Route::middleware(['auth', 'role:pasien'])->get('/pasien', function () {
//     return view('pasien.dashboard');
// });

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

// Route::middleware('auth')->group(function () {
//     Route::get('/dokter/periksa', function () {
//         return view('dokter.periksa');
//     });

//     Route::get('/dokter/obat', function () {
//         return view('dokter.obat');
//     });

//     Route::get('/pasien/periksa', function () {
//         return view('pasien.periksa');
//     });

//     Route::get('/pasien/riwayat', function () {
//         return view('pasien.riwayat');
//     });
// });

// Route::resource('obat', ObatController::class)->names('obat');
// Route::resource('pasiens', PasienController::class)->names('pasiens');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

// Halaman utama (beranda)
Route::middleware('guest')->get('/', function () {
    return view('poliklinik.beranda');
});

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// ---------------------------
// RBAC: Route untuk Dokter
// ---------------------------
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dokter', fn() => view('dokter.dashboard'));
    Route::get('/dokter/periksa', fn() => view('dokter.periksa'));
    Route::get('/dokter/obat', fn() => view('dokter.obat'));

    // Resource route hanya untuk dokter
    Route::resource('obat', ObatController::class)->names('obat');
    Route::resource('pasiens', PasienController::class)->names('pasiens');
});

// ---------------------------
// RBAC: Route untuk Pasien
// ---------------------------
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', fn() => view('pasien.dashboard'));
    Route::get('/pasien/periksa', fn() => view('pasien.periksa'));
    Route::get('/pasien/riwayat', fn() => view('pasien.riwayat'));
});
