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
    Schema::create('berita', function (Blueprint $table) {
        $table->id();
        $table->string('judul_berita');
        $table->string('foto')->nullable();
        $table->time('jam');
        $table->unsignedTinyInteger('tanggal');
        $table->unsignedTinyInteger('bulan');
        $table->unsignedSmallInteger('tahun');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
