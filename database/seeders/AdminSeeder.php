<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u=new User;
        $u->username   ="admin";
        $u->email      =null;
        $u->password   ="password";
        $u->assignRole('Admin');
        $u->save();
    }
}
