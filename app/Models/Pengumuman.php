<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumumans';

    protected $fillable = [
        'judul_pengumuman',
        'isi_pengumuman',
        'tgl_pengumuman',
        // add other attributes as needed
    ];
}
