<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailUserController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\MasaPklController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SertifikatController;

// Halaman landing
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (untuk semua user yang login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Profile (untuk semua user yang login)
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

// Detail User ( Untuk User isi Detail User )
Route::middleware(['auth'])->group(function () {

    // FORM
    Route::get('/detai-user.create', [DetailUserController::class, 'create'])
        ->name('detail-user.create');

    // SIMPAN
    Route::post('/detail-user/store', [DetailUserController::class, 'store'])
        ->name('detail-user.store');
});

// Sekolah( Untuk User isi Sekolah User )
Route::middleware(['auth'])->group(function () {

    // FORM
    Route::get('/sekolah.create', [SekolahController::class, 'create'])
        ->name('sekolah.create');

    // SIMPAN
    Route::post('/sekolah/store', [SekolahController::class, 'store'])
        ->name('sekolah.store');
});

// Masa PKL( Untuk User isi Masa Sekolah )
Route::middleware(['auth'])->group(function () {

    // FORM
    Route::get('/masa-pkl.create', [MasaPklController::class, 'create'])
        ->name('masa-pkl.create');

    // SIMPAN
    Route::post('/masa-pkl/store', [MasaPklController::class, 'store'])
        ->name('masa-pkl.store');
});

// Pendaftaram( Untuk User isi Pendaftran)
Route::middleware(['auth'])->group(function () {

    // FORM
    Route::get('/pendaftaran.create', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');

    // SIMPAN
    Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');

    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])
    ->name('pendaftaran.show');

    Route::get('/pendaftaran/{id}/terima', [PendaftaranController::class, 'terima'])
        ->name('pendaftaran.terima');

    Route::get('/pendaftaran/{id}/tolak', [PendaftaranController::class, 'tolak'])
        ->name('pendaftaran.tolak');

    Route::get('/pendaftaran/{id}/divisi', [PendaftaranController::class, 'formDivisi'])
        ->name('pendaftaran.divisi.form');

    Route::put('/pendaftaran/{id}/divisi', [PendaftaranController::class, 'setDivisi'])
        ->name('admin.pkl.setDivisi');
});

// Sertifikat (Upload Sertifikat)
Route::middleware(['auth'])->group(function () {

    // FORM
    Route::get('/sertifikat/create/{id}', [SertifikatController::class, 'create'])
        ->name('sertifikat.create');

    // SIMPAN
    Route::post('/sertifikat/store', [SertifikatController::class, 'store'])
        ->name('sertifikat.store');
});

require __DIR__.'/auth.php';
