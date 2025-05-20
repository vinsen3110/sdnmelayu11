<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama model jamak sudah sesuai)
    protected $table = 'fasilitas';

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'nama',
        'kategori',
        'jumlah',
        'foto1',
        'foto2',
        'foto3',
    ];

    // Optional: casting jika ingin pastikan 'jumlah' integer
    protected $casts = [
        'jumlah' => 'integer',
    ];
}
