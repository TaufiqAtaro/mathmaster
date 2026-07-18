<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SoalController;
use Illuminate\Support\Facades\Route;
use App\Models\Modul;

/*
|--------------------------------------------------------------------------
| 1. AREA PUBLIK (Bebas Akses)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $data_modul = \App\Models\Modul::latest()->take(3)->get();
    return view('welcome', compact('data_modul'));
});

Route::get('/tentang-kami', function () {
    return view('tentang_kami');
});

/*
|--------------------------------------------------------------------------
| 2. DASHBOARD / CONTROL PANEL
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| 3. AREA WAJIB LOGIN UMUM (Siswa & Admin bisa masuk)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Pengaturan Profil Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman Daftar Modul (Siswa)
    Route::get('/modul', function () {
        $moduls = Modul::all(); 
        return view('modul', compact('moduls'));
    });

    // FASE 2: Gating System & Ruang Belajar
    Route::get('/belajar/{id}', [ModulController::class, 'show']);
    
    // Kuis Per Materi 
    Route::get('/materi/{id}/kuis', [ModulController::class, 'kuisMateri']);
    Route::post('/materi/{id}/kuis', [ModulController::class, 'submitKuisMateri']);

    // Ujian Akhir Modul 
    Route::get('/modul/{id}/ujian', [ModulController::class, 'kuisModul']);
    Route::post('/modul/{id}/ujian', [ModulController::class, 'submitKuisModul']); 

    // Riwayat Kuis Siswa
    Route::get('/riwayat-kuis', [ModulController::class, 'riwayatKuis']);

    // Halaman Lobi Ruang Ujian (Semua Ujian)
    Route::get('/ruang-ujian', [ModulController::class, 'ruangUjian']);
});


/*
|--------------------------------------------------------------------------
| 4. AREA KHUSUS ADMIN (Dilindungi Middleware Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    
    // Kelola Modul Utama
    Route::get('/kelola-modul', [ModulController::class, 'index']);
    Route::get('/kelola-modul/tambah', [ModulController::class, 'create']);
    Route::post('/kelola-modul', [ModulController::class, 'store']);
    Route::get('/kelola-modul/{id}/edit', [ModulController::class, 'edit']);
    Route::put('/kelola-modul/{id}', [ModulController::class, 'update']);
    Route::delete('/kelola-modul/{id}', [ModulController::class, 'destroy']);
    
    // Kelola Materi
    Route::get('/materi/tambah', [MateriController::class, 'create']);
    Route::post('/materi', [MateriController::class, 'store']);
    Route::get('/materi/{id}/edit', [MateriController::class, 'edit']);
    Route::put('/materi/{id}', [MateriController::class, 'update']);
    Route::delete('/materi/{id}', [MateriController::class, 'destroy']);
    
    // Kelola Soal
    Route::get('/soal/tambah', [SoalController::class, 'create']);
    Route::post('/soal', [SoalController::class, 'store']);
    Route::get('/soal/{id}/edit', [SoalController::class, 'edit']);
    Route::put('/soal/{id}', [SoalController::class, 'update']);
    Route::delete('/soal/{id}', [SoalController::class, 'destroy']);

    // Masuk ke dalam Modul untuk melihat/kelola Materi
    Route::get('/kelola-modul/{modul_id}/materi', [App\Http\Controllers\MateriController::class, 'indexModul']);
    
    // Masuk ke dalam Materi untuk melihat/kelola Soal
    Route::get('/materi/{materi_id}/soal', [App\Http\Controllers\SoalController::class, 'indexMateri']);

    // ==============================================
    // KELOLA UJIAN AKHIR (BOSS FIGHT)
    // ==============================================
    Route::get('/kelola-ujian', [App\Http\Controllers\UjianAdminController::class, 'index']);
    Route::get('/kelola-ujian/{modul_id}', [App\Http\Controllers\UjianAdminController::class, 'show']);
    Route::get('/ujian/tambah', [App\Http\Controllers\UjianAdminController::class, 'create']);
    Route::post('/ujian', [App\Http\Controllers\UjianAdminController::class, 'store']);
    Route::get('/ujian/{id}/edit', [App\Http\Controllers\UjianAdminController::class, 'edit']);
    Route::put('/ujian/{id}', [App\Http\Controllers\UjianAdminController::class, 'update']);
    Route::delete('/ujian/{id}', [App\Http\Controllers\UjianAdminController::class, 'destroy']);

    // ==============================================
    // KELOLA SOAL KUIS (PER MATERI)
    // ==============================================
    Route::get('/soal/tambah', [App\Http\Controllers\SoalController::class, 'create']);
    Route::post('/soal', [App\Http\Controllers\SoalController::class, 'store']);
    Route::get('/soal/{id}/edit', [App\Http\Controllers\SoalController::class, 'edit']);
    Route::put('/soal/{id}', [App\Http\Controllers\SoalController::class, 'update']);
    Route::delete('/soal/{id}', [App\Http\Controllers\SoalController::class, 'destroy']);

    // ==============================================
    // REKAP NILAI SISWA (ADMIN)
    // ==============================================
    Route::get('/rekap-nilai', [App\Http\Controllers\ModulController::class, 'rekapNilai']);
});

require __DIR__.'/auth.php';