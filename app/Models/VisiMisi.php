<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi'; // default sudah sesuai, tapi eksplisit lebih aman

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
    ];
}
