<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->string('file_lampiran')->nullable(); // Untuk PDF/Word/Gambar
            $table->string('link_video')->nullable();    // Untuk link YouTube
        });
    }

    public function down()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->dropColumn(['file_lampiran', 'link_video']);
        });
    }
};
