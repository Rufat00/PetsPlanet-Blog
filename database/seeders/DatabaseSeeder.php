<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        Role::create([
            'role' => 'user',
            'permission_use_dashboard' => false,
            'permission_access_posts' => false,
            'permission_access_categories' => false,
            'permission_access_roles' => false,
            'permission_access_users' => false,
        ]);

        Role::create([
            'role' => 'admin',
            'permission_use_dashboard' => true,
            'permission_access_posts' => true,
            'permission_access_categories' => true,
            'permission_access_images' => true,
            'permission_access_roles' => true,
            'permission_access_users' => true,
        ]);

        Role::create([
            'role' => 'helper',
            'permission_use_dashboard' => true,
            'permission_access_posts' => true,
            'permission_access_categories' => true,
            'permission_access_images' => false,
            'permission_access_roles' => true,
            'permission_access_users' => true,
        ]);

        User::create([
            'email' => 'rufat.niftaliyev2007@gmail.com',
            'name' => 'Rufat',
            'password' => '$2y$10$J9ShjILTC8866V0j2xilYeZoxUYwzLXDBSO0jy0RJuXbGPEkSeq0y',
            'role_id' => '2',
        ]);

        User::create([
            'email' => 'helper@gmail.com',
            'name' => 'helper',
            'password' => '$2y$10$SXy371CBU5MkMkuQSxFZpevg9f7wHM3dC3fhDwrCLkuzAQdftmXsG',
            'role_id' => '3',
        ]);
    }
}
