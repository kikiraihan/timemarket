<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RolesTableSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(AnggotaunitSeeder::class);
        $this->call(TimSeeder::class);
        $this->call(AnggotatimSeeder::class);
        $this->call(TugasanggotatimSeeder::class);
    }
}
