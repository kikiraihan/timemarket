<?php

namespace Database\Seeders;

use App\Models\anggotaunit;
use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Support\Str;


class PegawaiSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Container::getInstance()->make(Generator::class);

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

        $nip=[
            "12794",
            "14245",
            "14546",

            "12130",
            "13389",
            "15187",
            "17627",
            "17761",
            "17861",
            "17804",
            "11111",
            "17331",
            "16649",
            "17145",
            "16277",
            "16314",
            "17440",
            "15388",
            "16831",
            "17363",
            "17413",
            "17461",
            "17087",
            "17459",
            "17373",
            "16676",
            "17406",
            "17562",
            "15044",
            "15048",
            "15813",
            "14793",
            "16038",
            "10995",
            "10970",
            "12104",
            "12117",
        ];




        for ($i=0; $i < count($nama); $i++) 
        { 
            $user = new User;
            $user->username="pegawai".($i+1);
            $user->email="pegawai".($i+1)."@gmail.com";
            $user->email_verified_at = now();
            $user->password = 'password';
            $user->remember_token = Str::random(10);
            $user->save();
            
            $pegawai = new Pegawai;
            $pegawai->nama = $nama[$i];
            $pegawai->singkatan = "P".$i;
            $pegawai->nip = $nip[$i];
            $pegawai->nomorwa = "08232132321".$i;
            $pegawai->id_user = $user->id;
            $pegawai->save();
        }



        


        


    }
}
