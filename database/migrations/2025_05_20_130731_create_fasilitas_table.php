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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['utama', 'pendukung']);
            $table->integer('jumlah');
            $table->string('foto1')->nullable(); // Kolom foto 1
            $table->string('foto2')->nullable(); // Kolom foto 2
            $table->string('foto3')->nullable(); // Kolom foto 3
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
