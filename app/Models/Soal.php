<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi balik ke Modul
    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}