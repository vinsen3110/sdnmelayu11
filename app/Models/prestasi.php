<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $primaryKey = 'id_prestasi';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [

    'nama_siswa',
    'nama_prestasi',
    'peringkat',
    'jenis_prestasi',
    'tingkat',
    'tahun',
    'deskripsi',
    'foto',
    
    ];
}
