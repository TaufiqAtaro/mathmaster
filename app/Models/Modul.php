<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Tambahkan baris ini 

class Modul extends Model
{
    use HasFactory; // 2. Tambahkan baris ini 
    // Hubungkan ke Model Materi
public function materis()
{
    return $this->hasMany(Materi::class);
}
}