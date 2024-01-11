<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $table = 'tamu';
    protected $fillable = [
        'nama_lengkap',
        'nomer_telp',
        'tanggal',
        'tujuan',
        'image',
        'status',

    ];
    protected $dates = ['tanggal'];
}
