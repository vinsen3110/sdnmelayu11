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
    Schema::table('ptk', function (Blueprint $table) {
        $table->string('email')->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('ptk', function (Blueprint $table) {
        $table->string('email')->nullable(false)->change(); // rollback ke NOT NULL jika dibutuhkan
    });
}

};
