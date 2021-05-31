<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'nama',
        'deskripsi',
        'jangka',
        'id_kepala',
        'judul_project',
        'target_pelaksanaan',
        'iku',
        'status',
    ];

    // relasi
    public function kepala()
    {
        return $this->belongsTo(Pegawai::class, "id_kepala");
    }

    public function anggotatims()
    {
        return $this->belongsToMany(
            Pegawai::class,
            'anggotatims',
            "id_tim",
            "id_pegawai"
        );
        
            // return $this->hasMany(anggotatim::class, "id_tim");
    }



    // 
    public function timsa()
    {

    }




    public function tims()
    {
        
    }
}
