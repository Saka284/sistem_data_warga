<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluargas';

    protected $fillable = [
        'nama_lengkap',
        'no_nik',
        'ttl',
        'jenis_kelamin',
        'golongan_darah',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'kepala_keluarga_id',
    ];

    // In Keluarga model
    public function headOfFamily()
    {
        return $this->belongsTo(KK::class, 'kepala_keluarga_id');
    }
}
