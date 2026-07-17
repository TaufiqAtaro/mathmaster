<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'modul_id',
        'judul_materi',
        'isi_materi',
        'file_lampiran',
        'link_video'
    ];

    // Relasi ke Modul (induknya)
    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }

    // TAMBAHKAN KODE INI: Relasi ke Soal (anaknya)
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
    
    // TAMBAHKAN KODE INI: Relasi ke Progress Materi
    public function progress()
    {
        return $this->hasMany(ProgressMateri::class);
    }
}