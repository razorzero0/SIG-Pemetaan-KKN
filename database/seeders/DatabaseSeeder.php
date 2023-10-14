<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory(1)->create([
        //     'name' => 'user',
        //     'password' => '123',
        // ]);

        Role::create([
            'name' => 'superadmin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'super@gmail.com',
            'password' => bcrypt('123'),
        ]);

        // $permissionSadmin = Permission::create(['name' => 'edit admin profile']);
        // $superadmin->givePermissionTo($permissionSadmin);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);
        // $permissionAdmin = Permission::create(['name' => 'edit profile']);
        // $admin->givePermissionTo($permissionAdmin);
        $admin->assignRole('admin');
    }
}
