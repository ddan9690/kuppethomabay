<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $executive = Role::firstOrCreate(['name' => 'executive']);
        $official = Role::firstOrCreate(['name' => 'official']);

        // Assign permissions
        $superAdmin->syncPermissions(Permission::all());

        $executive->syncPermissions([
            'manage-users',
            'manage-events',
            'view-reports',
            'approve-reports',
            'manage-members',
        ]);

        $official->syncPermissions([
            'view-reports',
            'submit-feedback',
            'view-feedback',
        ]);

        $this->command->info('Roles seeded and permissions assigned!');
    }
}