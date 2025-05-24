<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita'; // pastikan nama tabel sesuai

    protected $fillable = [
        'judul_berita',
        'foto',
        'jam',
        'tanggal',
        'bulan',
        'tahun',
    ];
}
