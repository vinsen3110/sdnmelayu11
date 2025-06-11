<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti default (ppdbs)
    protected $table = 'ppdb';

    // Kolom yang bisa diisi secara massal (mass assignment)
    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
    ];
}
