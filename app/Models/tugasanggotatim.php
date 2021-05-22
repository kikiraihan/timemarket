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

    // relasi
    public function anggotatim()
    {
        return $this->belongsTo(anggotatim::class, "id_anggotatim");
        
    }
}
