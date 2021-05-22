<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugasanggotaunit extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_anggotaunit',
        'judul',
        'deskripsi',

        'jenis',
        'startdate',
        'duedate',
        'status',
    ];

    // relasi
    public function anggotaunit()
    {
        return $this->belongsTo(anggotaunit::class, "id_anggotaunit");
    }
}
