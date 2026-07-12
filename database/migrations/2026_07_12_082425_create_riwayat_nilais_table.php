<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_nilais', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users (siapa siswa yang mengerjakan)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            
            // Relasi ke tabel moduls (materi apa yang dikerjakan)
            $table->foreignId('modul_id')->constrained('moduls')->cascadeOnDelete();
            
            $table->integer('skor_nilai'); // Menyimpan nilai 0 - 100
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_nilais');
    }
};
