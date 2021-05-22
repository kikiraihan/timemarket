<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    
    public function run()
    {
        


        $unit_akmal=[
            "KEKDA",
            "FPKEKDA",
            "HUMAS",
            "FDSEK",
            "FPPUKIS",
        ];

        $unit_huda=[
            "UMI",
            "PSP",
            "UIPUR",
            "SPPUR",
        ];

        
        $kpw=User::find(1);
        $huda=User::find(2);
        $akmal=User::find(3);

        $unit = new Unit;
        $unit->nama = "KEPALA";
        $unit->singkatan = "KPw";
        $unit->deskripsi= "ini KPw";
        $unit->id_kepala = $kpw->id;
        $unit->id_koordinator = $kpw->id;
        $unit->save();

        for ($i=0; $i < count($unit_akmal); $i++) 
        { 
            $unit = new Unit;
            $unit->nama = $unit_akmal[$i];
            $unit->singkatan = $unit_akmal[$i];
            $unit->deskripsi= "ini deskripsi";
            $unit->id_kepala = $akmal->id;
            $unit->id_koordinator = $akmal->id;
            $unit->save();
        }

        for ($i=0; $i < count($unit_huda); $i++) 
        { 
            $unit = new Unit;
            $unit->nama = $unit_huda[$i];
            $unit->singkatan = $unit_huda[$i];
            $unit->deskripsi= "ini deskripsi";
            $unit->id_kepala = $huda->id;
            $unit->id_koordinator = $huda->id;
            $unit->save();
        }



        

    }
}
