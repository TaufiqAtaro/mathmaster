<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;
use App\Models\Modul;

// 1. Landing Page Baru (Public)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/modul', function () {
    // Ambil semua data modul dari database
    $moduls = Modul::all(); 
    
    // Kirim data tersebut ke halaman modul.blade.php dengan nama '$moduls'
    return view('modul', compact('moduls'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/kelola-modul', [ModulController::class, 'index']);
    Route::get('/kelola-modul/tambah', [ModulController::class, 'create']);
    Route::post('/kelola-modul', [\App\Http\Controllers\ModulController::class, 'store']);
    Route::post('/kelola-modul/simpan', [ModulController::class, 'store']);
    Route::delete('/kelola-modul/{id}', [ModulController::class, 'destroy']);
    Route::get('/kelola-modul/{id}/edit', [ModulController::class, 'edit']);
    Route::put('/kelola-modul/{id}', [ModulController::class, 'update']);
    
    Route::get('/materi/tambah', [MateriController::class, 'create']);
    Route::post('/materi', [\App\Http\Controllers\MateriController::class, 'store']);
    Route::get('/materi/{id}/edit', [\App\Http\Controllers\MateriController::class, 'edit']);
    Route::put('/materi/{id}', [\App\Http\Controllers\MateriController::class, 'update']);
    Route::delete('/materi/{id}', [\App\Http\Controllers\MateriController::class, 'destroy']);
});

// Rute publik untuk halaman belajar siswa
Route::get('/belajar/{id}', [ModulController::class, 'show']);
// Rute untuk menampilkan soal kuis ke siswa
Route::get('/belajar/{id}/kuis', [\App\Http\Controllers\ModulController::class, 'kuis']);

// Rute untuk memproses jawaban dan menghitung nilai
Route::post('/belajar/{id}/kuis', [\App\Http\Controllers\ModulController::class, 'submitKuis']);

// Rute Kelola Kuis/Soal (Admin)
Route::get('/soal/tambah', [\App\Http\Controllers\SoalController::class, 'create']);
Route::post('/soal', [\App\Http\Controllers\SoalController::class, 'store']);

// Rute untuk Edit dan Hapus Soal
Route::get('/soal/{id}/edit', [\App\Http\Controllers\SoalController::class, 'edit']);
Route::put('/soal/{id}', [\App\Http\Controllers\SoalController::class, 'update']);
Route::delete('/soal/{id}', [\App\Http\Controllers\SoalController::class, 'destroy']);

Route::get('/rekap-nilai', [\App\Http\Controllers\ModulController::class, 'rekapNilai']);
// Rute untuk siswa melihat riwayat nilainya sendiri
Route::get('/riwayat-kuis', [\App\Http\Controllers\ModulController::class, 'riwayatKuis'])->middleware('auth');
require __DIR__.'/auth.php';
