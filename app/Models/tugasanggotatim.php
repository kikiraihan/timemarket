<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugasanggotatim extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_anggotatim',
        'judul',
        'startdate',
        'duedate',
        'status',
        'catatan',
        'level',
    ];

    protected $appends=[
        'namatim'
    ];

        //cara ambil tanggal bahasa indonesia
    // $undangan->tgl->formatLocalized("%A, %d %B %Y")

    protected $dates = [
        'startdate',
        'duedate'
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

    // public function anggotatim()
    // {
    //     return $this->belongsTo(anggotatim::class, "id_anggotatim");
        
    // }


    public function getNamatimAttribute()
    {
        return $this->tim->nama;
    }

}
