<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Pegawai']);
        Role::create(['name' => 'Chief']);

        // $this->command->info('Berhasil Menambahkan Roles');
        // $user->assignRole('Mahasiswa');

    }
}
