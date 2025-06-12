<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtkTable extends Migration
{
    public function up(): void
    {
        Schema::create('ptk', function (Blueprint $table) {
            $table->id();
            $table->string('no_tmt');
            $table->string('nama_ptk');
            $table->string('jabatan');
            $table->enum('status_kepegawaian', ['ASN', 'P3K', 'Honorer']);
            $table->string('pendidikan_terakhir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('foto')->nullable(); // Path atau nama file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
}
