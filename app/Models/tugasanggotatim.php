<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugasanggotatim extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_tim',
        'id_pegawai',
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



    // GETTER
    public function getNamatimAttribute()
    {
        if($this->tim==null)
        {
            return $this->id;
        }

        return $this->tim->nama;
    }

    public function getRangeHariAttribute()
    {
        return $this->duedate->diffInDays($this->startdate);
    }




    // SCOPE
    public function scopeBelumselesai($query)
    {
        return $query->where('status','!=','done');
    }

    public function scopeYangselesai($query)
    {
        return $query->where('status','=','done');
    }

    public function scopeYangStartAtauDuePada($query,$tahun,$bulan)
    {
        return $query
        ->where(function($query) use($tahun, $bulan)
        {
            $query->where(function($query) use($tahun, $bulan)
            {
                // return 
                $query->whereYear('startdate', $tahun)
                        ->whereMonth('startdate', $bulan);
                // return $query->where('startdate', "LIKE", $tahun."-".$bulan."-%");
            })
            ->orWhere(function($query) use($tahun, $bulan) 
            {
                // return 
                $query->whereYear('duedate', $tahun)
                        ->whereMonth('duedate', $bulan);
            });
        });
    }

}
