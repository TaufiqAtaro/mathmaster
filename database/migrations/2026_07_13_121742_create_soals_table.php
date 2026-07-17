<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            // Tetap terhubung ke Modul (induk utama)
            $table->foreignId('modul_id')->constrained('moduls')->onDelete('cascade');
            
            // BARU: Terhubung ke Materi (Bisa kosong/null jika ini adalah soal Ujian Akhir Modul)
            $table->foreignId('materi_id')->nullable()->constrained('materis')->onDelete('cascade'); 
            
            // BARU: Penanda jenis soal
            $table->enum('tipe_soal', ['kuis_materi', 'ujian_modul'])->default('kuis_materi'); 
            
            $table->text('pertanyaan');
            $table->string('opsi_a');
            $table->string('opsi_b');
            $table->string('opsi_c');
            $table->string('opsi_d');
            $table->enum('jawaban_benar', ['a', 'b', 'c', 'd']);
            $table->text('pembahasan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};