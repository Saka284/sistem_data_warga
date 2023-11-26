<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $table = 'rt';
    protected $fillable = [
        'nama_lengkap',
        'no_rt',
        'no_nik',
        'no_kk',
        'ttl',
        'jenis_kelamin',
        'golongan_darah',
        'alamat',
        'agama',
        'status_perkawinan',
        // add other attributes as needed
    ];
}
