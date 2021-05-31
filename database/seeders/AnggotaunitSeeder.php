<?php

namespace Database\Seeders;

use App\Models\anggotaunit;
use App\Models\Pegawai;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class AnggotaunitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama=[
            "Budi Widihartanto",
            "Miftahul Huda",
            "Akmaluddin Suangkupon",

            "Ahmad Surono",
            "Muhammad Syazali",
            "Derwan Dani",
            "Arief Setyowidodo",
            "Abdullah Ulil Albab",
            "Muhammad Shofwat Syauqi",
            "Farly Revindatama",
            "Hilmy Mu'nis",
            "Siddiq Fahriady Seban",
            "Adelin l. Abas",
            "Citra",
            "Arief Chandra",
            "Dimas Seto Pujianto",
            "Leonardo William Goni",
            "Sigit Iman Gus Risanto",
            "Sitti Murtafi'ah Mooduto",
            "Yogo Prasetyo",
            "Dheny Hadi Sundoro",
            "Michael S. Tupamahu",
            "Abdul Haris Masi",
            "Hilmawan Jahja",
            "Mohamad Riyanto Gobel",
            "Asrianti Jafar",
            "Alexander Sitompul",
            "Ridsa Septiyan Tangkuman",
            "Setya Putra Utama",
            "Heru Roji Dwi Santoso",
            "Haidar Rizky Suaiba",
            "Rifki Ismail",
            "Hendro Sirait",
            "F. Rumanto Mayang",
            "Arnold P. Sawotong",
            "Mulyono B Sastrowiyono",
            "Ojih",
        ];


        $anggota_unit=[
            "KEPALA",
            "SPPUR",
            "KEKDA",

            "UIPUR",
            "UMI",
            "PSP",
            "FPKEKDA",
            "HUMAS",
            "FPKEKDA",
            "FDSEK",
            "FPPUKIS",
            "FPPUKIS",
            "UMI",
            "PSP",
            "UIPUR",
            "UIPUR",
            "UIPUR",
            "UMI",
            "HUMAS",
            "UMI",
            "UIPUR",
            "UIPUR",
            "FDSEK",
            "UIPUR",
            "UIPUR",
            "UMI",
            "UIPUR",
            "UIPUR",
            "UMI",
            "UMI",
            "UMI",
            "FPPUKIS",
            "FPKEKDA",
            "UMI",
            "PSP",
            "UIPUR",
            "UIPUR",
        ];

        // seeder Pegawai Unit
        for ($i=0; $i < count($nama); $i++) 
        { 
            $id_pegawai = Pegawai::where('nama', '=', $nama[$i])->first()->id;
            $id_unit = Unit::where('nama', '=', $anggota_unit[$i])->first()->id;

            $angg = new anggotaunit;
            
            $angg->id_pegawai = $id_pegawai;
            $angg->id_unit = $id_unit;

            if( 
                $anggota_unit[$i]=="KEKDA" 
                OR $anggota_unit[$i]=="SPPUR"  
            )
            $angg->role = "Koordinator";
            elseif($anggota_unit[$i]=="KEPALA")
            $angg->role = "KPw";
            elseif($nama[$i]=="Abdullah Ulil Albab")
            $angg->role = "Kepala";
            else
            $angg->role="Anggota";
            
            $angg->save();
        };



        // ganti Kepala HUMAS
        $unit=Unit::where('nama','=',"HUMAS")->first();
        $pg=Pegawai::where('nama','=',"Abdullah Ulil Albab")->first();
        $unit->id_kepala=$pg->id;
        $unit->save();

    }
}
