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
| 2. PENGATUR ARAH SETELAH LOGIN 
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    // Jika yang login adalah Admin, arahkan ke halaman kelola modul
    if (auth()->user()->role === 'admin') {
        return redirect('/kelola-modul'); 
    }
    // Jika yang login Siswa, langsung arahkan ke ruang belajar
    return redirect('/modul');
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
    
    // Kuis Per Materi (Syarat buka gembok)
    Route::get('/materi/{id}/kuis', [ModulController::class, 'kuisMateri']);
    Route::post('/materi/{id}/kuis', [ModulController::class, 'submitKuisMateri']);
    
    // Ujian Akhir Modul (Boss Fight)
    Route::get('/modul/{id}/ujian', [ModulController::class, 'kuisModul']);

    // Riwayat Kuis Siswa
    Route::get('/riwayat-kuis', [ModulController::class, 'riwayatKuis']);
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

    // Rekap Nilai Siswa
    Route::get('/rekap-nilai', [ModulController::class, 'rekapNilai']);
});

require __DIR__.'/auth.php';