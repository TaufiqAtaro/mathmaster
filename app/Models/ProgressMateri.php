<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressMateri extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materi_id',
        'skor',
        'is_lulus'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Materi
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}