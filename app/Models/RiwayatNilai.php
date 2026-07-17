<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatNilai extends Model
{
    use HasFactory;

    // Tambahkan daftar kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'user_id',
        'modul_id',
        'skor_nilai'
    ];

    // Relasi ke User (Siswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Modul
    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}