<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNoTmtColumnTypeInPtkTable extends Migration
{
    public function up()
    {
        Schema::table('ptk', function (Blueprint $table) {
            // Ubah kolom no_tmt menjadi tipe date
            $table->date('no_tmt')->change();
        });
    }

    public function down()
    {
        Schema::table('ptk', function (Blueprint $table) {
            // Balikkan ke tipe sebelumnya, misalnya string
            $table->string('no_tmt')->change();
        });
    }
}
