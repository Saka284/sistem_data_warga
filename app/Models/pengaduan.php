<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';

    protected $fillable = ['name', 'user_id', 'description', 'nomer_telp', 'image', 'status'];


    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(Pengaduan::class, 'id', 'id');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }

    public function tanggapans()
    {
        return $this->belongsTo(Pengaduan::class, 'id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Tanggapan::class, 'status_id', 'status');
    }
}
