<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkskulsTable extends Migration
{
    public function up(): void
    {
        Schema::create('ekskuls', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ekskul');
            $table->string('pembina');
            $table->string('hari_kegiatan');
            $table->time('waktu_kegiatan');
            $table->text('deskripsi');
            $table->string('foto')->nullable(); // path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekskuls');
    }
}
