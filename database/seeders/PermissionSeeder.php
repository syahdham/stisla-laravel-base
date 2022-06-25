<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'dashboard',
        ]);

        Permission::create([
            'name' => 'system_management_access',
        ]);

        Permission::create([
            'name' => 'permission_create',
        ]);

        Permission::create([
            'name' => 'permission_edit',
        ]);

        Permission::create([
            'name' => 'permission_delete',
        ]);

        Permission::create([
            'name' => 'permission_access',
        ]);

        Permission::create([
            'name' => 'role_create',
        ]);

        Permission::create([
            'name' => 'role_edit',
        ]);

        Permission::create([
            'name' => 'role_delete',
        ]);

        Permission::create([
            'name' => 'role_access',
        ]);

        Permission::create([
            'name' => 'user_create',
        ]);

        Permission::create([
            'name' => 'user_edit',
        ]);

        Permission::create([
            'name' => 'user_delete',
        ]);

        Permission::create([
            'name' => 'user_access',
        ]);

    }
}
