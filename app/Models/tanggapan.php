<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapans';

    protected $fillable = [
        'id', 'pengaduan_id', 'tanggapan', 'petugas_id',
    ];

    public function pengaduan()
    {
        return $this->hasOne(Pengaduan::class, 'id', 'id');
    }
}
