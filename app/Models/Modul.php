<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    use HasFactory; 

    // Tambahkan blok fillable ini agar gambar dan data lainnya bisa disimpan
    protected $fillable = [
        'judul_modul',
        'tingkat_kelas',
        'deskripsi',
        'gambar_modul',
    ];

    // Hubungkan ke Model Materi
    public function materis()
    {
        return $this->hasMany(Materi::class);
    }
    // Satu modul punya banyak soal kuis
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
}