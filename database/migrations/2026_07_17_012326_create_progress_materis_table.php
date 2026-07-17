<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progress_materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('materi_id')->constrained('materis')->cascadeOnDelete();
            
            $table->integer('skor'); 
            $table->boolean('is_lulus')->default(false); // True jika skor >= 70
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress_materis');
    }
};