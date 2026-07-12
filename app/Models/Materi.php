<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    // Hubungkan ke Model Modul
    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}