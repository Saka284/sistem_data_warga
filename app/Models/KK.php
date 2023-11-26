<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    use HasFactory;
    protected $table = 'kepala_keluarga';
    protected $fillable = [
        'nama_lengkap',
        'no_nik',
        'no_kk',
        'ttl',
        'jenis_kelamin',
        'golongan_darah',
        'alamat',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'rt_id',
    ];
}
