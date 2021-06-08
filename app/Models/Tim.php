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
        )->withTimestamps();
        
            // return $this->hasMany(anggotatim::class, "id_tim");
    }

    public function tugasanggotatims()
    {
        return $this->hasMany(tugasanggotatim::class,'id_tim',"id")->with('pegawai');
    }



    // GETTER

    public function getAnggotaTimsOnlyIdAttribute()
    {
        $ini= $this->anggotatims()->get(['id']);
        $return=$ini->map(function ($user) {
            return $user->id;
        });

        return $return;
    }

    public function isThisUserKepalaTim($id)
    {
        if($this->id_kepala==$id) return true;
        else return false;
    }

    // tugas anggota tim
    public function getJumlahTugasByIdPegawai($id_pegawai)
    {
        return $this->tugasanggotatims()
        ->where('id_pegawai','=',$id_pegawai)
        ->count();
    }
    public function getJumlahTugasSelesaiByIdPegawai($id_pegawai)
    {
        return $this->tugasanggotatims()
        ->where('id_pegawai','=',$id_pegawai)
        ->Yangselesai()
        ->count();
    }
    
    public function getTugasByIdPegawai($id_pegawai)
    {
        return $this->tugasanggotatims()
        ->where('id_pegawai','=',$id_pegawai)
        ->get();
    }

    public function getKepalaNamaAttribute()
    {
        return $this->kepala->nama;   
    }



    // SCOPE
    public function scopeProkersaya($query,$id_pegawai)
    {
        return $query->where('id_kepala','=',$id_pegawai);
    }
    







}
