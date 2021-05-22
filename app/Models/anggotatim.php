<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggotatim extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'id_tim',
        'id_pegawai',
        // 'role',
    ];

    // relasi
    public function tim()
    {
        return $this->belongsTo(Tim::class, "id_tim");
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, "id_pegawai");
    }

    public function tugasanggotatim()
    {
        return $this->hasMany(tugasanggotatim::class, "id_anggotatim");
    }
}
