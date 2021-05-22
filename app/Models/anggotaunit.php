<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggotaunit extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_pegawai',
        'id_unit',
        'role',
    ];




    // Relasi
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, "id_pegawai");
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, "id_unit");
    }

    public function tugasanggotaunits()
    {
        return $this->hasMany(tugasanggotaunit::class, "id_anggotaunit");
    }
}
