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
    Route::post('/materi/simpan', [MateriController::class, 'store']);
});

// Rute publik untuk halaman belajar siswa
Route::get('/belajar/{id}', [ModulController::class, 'show']);

require __DIR__.'/auth.php';
