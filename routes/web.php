<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ModulController;

// Jika ada yang buka URL /modul, jalankan fungsi index di ModulController
Route::get('/modul', [ModulController::class, 'index']);

// Menampilkan halaman form
Route::get('/modul/tambah', [ModulController::class, 'create']);

// Menerima data dari form dan menyimpannya
Route::post('/modul/simpan', [ModulController::class, 'store']);

// Menghapus data modul berdasarkan ID
Route::delete('/modul/{id}', [ModulController::class, 'destroy']);

// Menampilkan halaman form edit dengan data lama
Route::get('/modul/{id}/edit', [ModulController::class, 'edit']);

// Menyimpan perubahan data (Timpa data lama)
Route::put('/modul/{id}', [ModulController::class, 'update']);