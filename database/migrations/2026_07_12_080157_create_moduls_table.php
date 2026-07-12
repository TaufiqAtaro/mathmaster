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
    Schema::create('moduls', function (Blueprint $table) {
        $table->id();
        $table->string('judul_modul'); // Membuat kolom VARCHAR(255)
        $table->text('deskripsi')->nullable(); // Kolom TEXT, boleh kosong
        $table->integer('tingkat_kelas'); // Kolom angka untuk kelas (misal: 7, 8, 9)
        $table->timestamps(); // Otomatis membuat kolom created_at & updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduls');
    }
};
