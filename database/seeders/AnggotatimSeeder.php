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
        
        //bbm
        //mas arief
        $tim = Tim::find(1);
        $tim->anggotatims()->attach(7);

        //mas abil
        $tim = Tim::find(1);
        $tim->anggotatims()->attach(8);

        //mba desi
        $tim = Tim::find(1);
        $tim->anggotatims()->attach(19);

        


        // PSBI B
        //mas abil
        $tim = Tim::find(2);
        $tim->anggotatims()->attach(8);
        //mba desi
        $tim = Tim::find(2);
        $tim->anggotatims()->attach(19);
        


        // INFO
        $tim = Tim::find(3);
        $tim->anggotatims()->attach(7);

        $tim = Tim::find(3);
        $tim->anggotatims()->attach(14);//citra

        $tim = Tim::find(3);
        $tim->anggotatims()->attach(8);

        
    }
}
