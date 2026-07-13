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
    Schema::table('moduls', function (Blueprint $table) {
        // nullable() artinya boleh kosong (kalau admin belum upload gambar)
        $table->string('gambar_modul')->nullable()->after('deskripsi');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moduls', function (Blueprint $table) {
            //
        });
    }
};
