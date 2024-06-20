<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(
            //create permission akses user
            ['name' => 'user.index'],
            ['name' => 'user.create'],
            ['name' => 'user.edit'],
            ['name' => 'user.delete'],
            //create permission akses permission
            ['name' => 'role.index'],
            ['name' => 'role.create'],
            ['name' => 'role.edit'],
            ['name' => 'role.delete'],
            //create permission akses permission
            ['name' => 'permission.index'],
        );
    }
}
