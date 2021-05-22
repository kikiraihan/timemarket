<?php

namespace Database\Seeders;

use App\Models\anggotatim;
use Illuminate\Database\Seeder;

class AnggotatimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ag= new anggotatim;
        $ag->id_tim = 1;//bbm
        $ag->id_pegawai = 7;//mas arief
        $ag->save();

        $ag= new anggotatim;
        $ag->id_tim = 1;//bbm
        $ag->id_pegawai = 8;//mas abil
        $ag->save();

        $ag= new anggotatim;
        $ag->id_tim = 1;//bbm
        $ag->id_pegawai = 19;//mba desi
        $ag->save();


        // 2
        $ag= new anggotatim;
        $ag->id_tim = 2;//PSBI-B
        $ag->id_pegawai = 8;//mas abil
        $ag->save();

        $ag= new anggotatim;
        $ag->id_tim = 2;//PSBI-B
        $ag->id_pegawai = 19;//mba desi
        $ag->save();


        // 3
        $ag= new anggotatim;
        $ag->id_tim = 3;//INFO
        $ag->id_pegawai = 7;//mas arief
        $ag->save();

        $ag= new anggotatim;
        $ag->id_tim = 3;//INFO
        $ag->id_pegawai = 14;//Citra
        $ag->save();

        $ag= new anggotatim;
        $ag->id_tim = 3;//INFO
        $ag->id_pegawai = 8;//Mas Abil
        $ag->save();

        
    }
}
