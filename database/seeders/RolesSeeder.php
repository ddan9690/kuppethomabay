<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $executive = Role::firstOrCreate(['name' => 'executive']);
        $organisingSecretary = Role::firstOrCreate(['name' => 'organising-secretary']);
        $subCountyRep = Role::firstOrCreate(['name' => 'subcounty-bbf-rep']);

        Permission::firstOrCreate(['name' => 'manage-users']);

        Permission::firstOrCreate(['name' => 'view-bbf-memberships']);
        Permission::firstOrCreate(['name' => 'manage-bbf-memberships']);
        Permission::firstOrCreate(['name' => 'approve-bbf-memberships']);

        Permission::firstOrCreate(['name' => 'view-claims']);
        Permission::firstOrCreate(['name' => 'manage-claims']);
        Permission::firstOrCreate(['name' => 'approve-claims']);

        Permission::firstOrCreate(['name' => 'manage-bookings']);
        Permission::firstOrCreate(['name' => 'view-bookings']);

        Permission::firstOrCreate(['name' => 'view-reports']);

        $superAdmin->syncPermissions(Permission::all());

        $executive->syncPermissions([
            'manage-users',
            'view-bbf-memberships',
            'manage-bbf-memberships',
            'approve-bbf-memberships',
            'view-claims',
            'manage-claims',
            'approve-claims',
            'manage-bookings',
            'view-bookings',
            'view-reports',
        ]);

        $organisingSecretary->syncPermissions([
            'manage-users',
            'view-bbf-memberships',
            'manage-bbf-memberships',
            'view-claims',
            'manage-claims',
            'manage-bookings',
            'view-bookings',
            'view-reports',
        ]);

        $subCountyRep->syncPermissions([
            'view-bbf-memberships',
            'view-claims',
            'manage-claims'
        ]);

        $this->command->info('Roles and permissions updated successfully.');
    }
}