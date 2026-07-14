<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    use HasFactory;

    protected $table = 'hasil_kuis';
    protected $guarded = [];

    // Relasi ke tabel User (Siswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel Modul
    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}