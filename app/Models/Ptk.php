<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptk extends Model
{
    use HasFactory;

    protected $table = 'ptk'; // Pastikan sesuai nama tabel di database

    protected $fillable = [
        'no_tmt',
        'nama_ptk',
        'jabatan',
        'status_kepegawaian',
        'pendidikan_terakhir',
        'jenis_kelamin',
        'no_hp',
        'email',
        'foto',
    ];
}
