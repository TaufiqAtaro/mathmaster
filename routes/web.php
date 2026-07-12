<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;
use App\Models\Modul;

Route::get('/', function () {
    // Tarik semua modul beserta materi di dalamnya (Eager Loading)
    $data_modul = Modul::with('materis')->get();
    return view('welcome', compact('data_modul'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/modul', [ModulController::class, 'index']);
    Route::get('/modul/tambah', [ModulController::class, 'create']);
    Route::post('/modul/simpan', [ModulController::class, 'store']);
    Route::delete('/modul/{id}', [ModulController::class, 'destroy']);
    Route::get('/modul/{id}/edit', [ModulController::class, 'edit']);
    Route::put('/modul/{id}', [ModulController::class, 'update']);
    
    Route::get('/materi/tambah', [MateriController::class, 'create']);
    Route::post('/materi/simpan', [MateriController::class, 'store']);
});

// Rute publik untuk halaman belajar siswa
Route::get('/belajar/{id}', [ModulController::class, 'show']);

require __DIR__.'/auth.php';
