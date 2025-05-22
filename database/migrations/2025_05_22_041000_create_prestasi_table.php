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
    Schema::create('prestasi', function (Blueprint $table) {
        $table->id('id_prestasi');
        $table->string('nama_siswa');
        $table->string('nama_prestasi');
        $table->string('peringkat');
        $table->string('jenis_prestasi');
        $table->string('tingkat');
        $table->year('tahun');
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
