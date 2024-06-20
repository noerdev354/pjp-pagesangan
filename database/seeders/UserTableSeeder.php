<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data user
        $userCreate = User::create([
            'name'      => 'superadmin',
            'email'     =>  'superadmin@gmail.com',
            'password'  => bcrypt('Qwerty1234')
        ]);

        //assign permission to role
        $permission = Permission::all();

        $role = Role::find(1);
        $role->syncPermissions($permission);

        //assign role with permission to user
        $user = User::find(1);
        $user->assignRole($role->name);
    }
}
