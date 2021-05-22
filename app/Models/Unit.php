<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama',
        'singkatan',
        'deskripsi',
        'id_kepala',
        'id_koordinator',
    ];


    // relasi

    public function anggotaunits()
    {
        return $this->hasMany(anggotaunit::class,'id_unit');
    }

    public function kepala()
    {
        return $this->belongsTo(Pegawai::class, "id_kepala");
    }

    public function koordinator()
    {
        return $this->belongsTo(Pegawai::class, "id_koordinator");
    }
}
