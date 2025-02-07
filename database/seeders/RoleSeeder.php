<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $superAdmin = Role::updateOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);



        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to super_admin
        $superAdmin->syncPermissions($permissions);


        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
