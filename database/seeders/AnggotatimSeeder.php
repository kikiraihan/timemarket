<?php

namespace Database\Seeders;

// use App\Models\anggotatim;
use App\Models\Tim;
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
        //suwangkupon
        $tim = Tim::find(1);
        $tim->anggotatims()->attach(3);
        $tim = Tim::find(2);
        $tim->anggotatims()->attach(3);
        $tim = Tim::find(3);
        $tim->anggotatims()->attach(3);
        
        //bbm
        $tim = Tim::find(1);
        //mas arief
        $tim->anggotatims()->attach(7);
        //mas abil
        $tim->anggotatims()->attach(8);
        //mba desi
        $tim->anggotatims()->attach(19);

        


        // PSBI B
        $tim = Tim::find(2);
        //mas abil
        $tim->anggotatims()->attach(8);
        //mba desi
        $tim->anggotatims()->attach(19);
        


        // INFO
        $tim = Tim::find(3);
        $tim->anggotatims()->attach(7);
        $tim->anggotatims()->attach(14);//citra
        $tim->anggotatims()->attach(8);



        // $this->command->info('Berhasil Menambahkan Anggota Tim');
        
    }
}
