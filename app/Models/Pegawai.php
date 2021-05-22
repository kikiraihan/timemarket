<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama',
        'singkatan',
        'nip',
        'nomorwa',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }

    public function anggotaunit()
    {
        return $this->hasOne(anggotaunit::class,'id_pegawai');
    }



    public function mengkoordinirunit()
    {
        return $this->hasMany(Unit::class,'id_koordinator');
    }

    public function mengepalaiunit()
    {
        return $this->hasMany(Unit::class,'id_kepala');
    }

    public function mengepalaitim()
    {
        return $this->hasMany(Unit::class,'id_kepala');
    }

}
