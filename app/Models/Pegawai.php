<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    protected $appends=[
        'nama_singkat'
    ];



    // RELASI
    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }


    
    // ==== UNIT =======
    public function anggotaunit()
    {
        return $this->hasOne(anggotaunit::class,'id_pegawai',"id");
    }

    // hanya satu sebenarnya, cma tida ada BelongsToOne
    // bleh hapus
    public function unit()
    {
        return $this->belongsToMany(
            Unit::class,
            'anggotaunits',
            "id_pegawai",
            "id_unit"
        );
    }

    public function tugasanggotaunits()
    {
        return $this->hasMany(tugasanggotaunit::class,'id_pegawai',"id");
    }

    public function mengkoordinirunit()
    {
        return $this->hasMany(Unit::class,'id_koordinator');
    }

    public function mengepalaiunit()
    {
        return $this->hasMany(Unit::class,'id_kepala');
    }
    // ==== batas UNIT =======



    // ==== TIM =======
    public function tims()
    {
        return $this->belongsToMany(
            Tim::class,
            'anggotatims',
            "id_pegawai",
            "id_tim");
    }

    public function tugasanggotatims()
    {
        return $this->hasMany(tugasanggotatim::class,'id_pegawai',"id");
    }

    public function mengepalaitim()//koordinir dan kepala sekaligus klo tim
    {
        return $this->hasMany(Unit::class,'id_kepala');
    }
    // ==== batas TIM =======




    
    
    
    
    // ACCESSOR GETTER
    // cek
    public function getIsUserLoginAttribute()
    {
        if($this->user->id==Auth::user()->id) 
        return true;
        else
        return false;
    }

    // nama
    public function getNamaSingkatAttribute()
    {
        $singkat=explode(" ",$this->nama);
        $return="";
        foreach($singkat as $s){
            $return=$return.substr($s,0,1);
        }

        return $return;
    }

    // tugas
    public function getTugasSelesaiAttribute()
    {
        return $this->tugasanggotatims()->where('status','=','done')->get();
    }
    public function getJumlahTugasSelesaiAttribute()
    {
        return $this->tugasanggotatims()->where('status','=','done')->count();
    }
    public function getJumlahTugasAttribute()
    {
        return $this->tugasanggotatims->count();
    }

    // Proker
    public function getProkerSelesaiAttribute()
    {
        return $this->tims()
        ->where(function ($query){
            $query->where('status','=','done');
        })
        ->get();
    }
    public function getJumlahProkerSelesaiAttribute()
    {
        return $this->ProkerSelesai->count();
    }
    public function getJumlahProkerAttribute()
    {
        return $this->tims->count();
    }

    // lainnya
    public function getTugasDalamBulan($bulan,$tahun)
    {
        
        return $this->hasMany(tugasanggotatim::class,'id_pegawai',"id")
        
        ->where(function($query) use($tahun, $bulan)
        {
            $query->where(function($query) use($tahun, $bulan)
            {
                return $query->whereYear('startdate', $tahun)
                        ->whereMonth('startdate', $bulan);
                // return $query->where('startdate', "LIKE", $tahun."-".$bulan."-%");
            })
            ->orWhere(function($query) use($tahun, $bulan) 
            {
                return $query->whereYear('duedate', $tahun)
                        ->whereMonth('duedate', $bulan);
            });
        })
        ->orderBy('startdate', 'asc')
        ->get()
        ;   

        // return $this->tugasanggotatims->sortBy(['startdate', 'asc'])->filter( function($item) use($tahun, $bulan){
            
        //     if ($item->startdate->year==$tahun) 
        //     {
        //         if ($item->startdate->month==$bulan) 
        //         {
        //             return $item;
        //         }
        //     }
        //     elseif ($item->duedate->year==$tahun) 
        //     {
        //         if ($item->duedate->month==$bulan) 
        //         {
        //             return $item;
        //         }
        //     }
        // });
    }

    public function getTugasDalamHari($tanggal)
    {
        // 2021-02-12
        $tanggalPosisi=Carbon::parse($tanggal);

        return $this->getTugasDalamBulan($tanggalPosisi->month,$tanggalPosisi->year)
                ->sortBy(['startdate', 'asc'])
                ->filter( function($item) use($tanggalPosisi)
                {
                    if($tanggalPosisi->between($item->startdate->format("Y-m-d"),$item->duedate->format("Y-m-d")))
                    return $item;
                });

        // return $this->hasMany(tugasanggotatim::class,'id_pegawai',"id")
        // ->where();
    }



    public function getTugasDalamMingguKalenderUtama($tanggal)
    {
        // 2021-02-12
        $tanggalPosisi=Carbon::parse($tanggal);
        
        $awalMinggu=Carbon::parse($tanggalPosisi->startOfWeek(Carbon::SUNDAY));
        $akhirMinggu=Carbon::parse($tanggalPosisi->endOfWeek(Carbon::SATURDAY));

        // return [$awalMinggu, $akhirMinggu];

        return $this->hasMany(tugasanggotatim::class,'id_pegawai',"id")
        ->where(function($query) use($awalMinggu, $akhirMinggu)
        {
            $query->where(function($query) use($awalMinggu, $akhirMinggu)
            {
                return $query
                        // ->whereYear('startdate', "<=", $akhirMinggu->year)
                        // ->whereMonth('startdate', "<=", $akhirMinggu->month)
                        // ->whereDay('startdate', "<=", $akhirMinggu->day);
                        ->whereDate('startdate', "<=", $akhirMinggu->format('Y-m-d'));
            })
            ->where(function($query) use($awalMinggu, $akhirMinggu)
            {
                return $query
                        // ->whereYear('duedate', ">=", $awalMinggu->year)
                        // ->whereMonth('duedate', ">=", $awalMinggu->month)
                        // ->whereDay('duedate', ">=", $awalMinggu->day);
                        ->whereDate('duedate', ">=", $awalMinggu->format('Y-m-d'));
            });
        })
        ->orderBy('startdate', 'asc')
        ->get()
        ;   
    }



    
    public function getTugasDalamTanggalBetween($awal,$akhir)
    {
        // 2021-02-12 , Y-m-d
        $awalMinggu=Carbon::parse($awal);
        $akhirMinggu=Carbon::parse($akhir);

        // return [$awalMinggu, $akhirMinggu];

        return $this->hasMany(tugasanggotatim::class,'id_pegawai',"id")
        ->where(function($query) use($awalMinggu, $akhirMinggu)
        {
            $query->where(function($query) use($awalMinggu, $akhirMinggu)
            {
                return $query
                        // ->whereYear('startdate', "<=", $akhirMinggu->year)
                        // ->whereMonth('startdate', "<=", $akhirMinggu->month)
                        // ->whereDay('startdate', "<=", $akhirMinggu->day);
                        ->whereDate('startdate', "<=", $akhirMinggu->format('Y-m-d'));
            })
            ->where(function($query) use($awalMinggu, $akhirMinggu)
            {
                return $query
                        // ->whereYear('duedate', ">=", $awalMinggu->year)
                        // ->whereMonth('duedate', ">=", $awalMinggu->month)
                        // ->whereDay('duedate', ">=", $awalMinggu->day);
                        ->whereDate('duedate', ">=", $awalMinggu->format('Y-m-d'));
            });
        })
        ->orderBy('startdate', 'asc')
        ->get()
        ;
    }











































    // dipikirkan dlu errornya

    public function getTugasDalamMingguPerMingguacuy(Carbon $posisi)
    {

        $posisi = Carbon::
        createFromDate($posisi->year, $posisi->month,1)
        ->locale('in');
        $bulan=$posisi->month;
        $tahun=$posisi->year;

        $awalMinggu=$posisi->startOfWeek(Carbon::SUNDAY);
        $akhirMinggu=$posisi->endOfWeek(Carbon::SATURDAY);
        
        return
        $this->getTugasDalamBulan($bulan,$tahun)
        
            ->filter(function($item) use($awalMinggu,$akhirMinggu)
            {
                if($item->startdate->between($awalMinggu->format('Y-m-d'), $akhirMinggu->format('Y-m-d')))
                return $item;
                elseif($item->duedate->between($awalMinggu->format('Y-m-d'), $akhirMinggu->format('Y-m-d')))
                return $item;
            })
            ;
    }

















}

    /*
    Sometimes you may want to count the number of related models for 
    a given relationship without actually loading the models. 
    */
    // $posts = Post::withCount('comments')->get();
    // foreach ($posts as $post) {
    //     echo $post->comments_count;
    // }