<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // -----------------------------
        // Create Roles
        // -----------------------------
        $superAdmin      = Role::firstOrCreate(['name' => 'super-admin']);
        $executive       = Role::firstOrCreate(['name' => 'executive']);
        $official        = Role::firstOrCreate(['name' => 'official']);
        $subCountyBbfRep = Role::firstOrCreate(['name' => 'subcounty-bbf-rep']);
        $becBbf          = Role::firstOrCreate(['name' => 'bec-bbf']); // for BEC approval stage

        // -----------------------------
        // Create Permissions
        // -----------------------------
        // General permissions
        Permission::firstOrCreate(['name' => 'manage-users']);
        Permission::firstOrCreate(['name' => 'manage-events']);
        Permission::firstOrCreate(['name' => 'view-reports']);
        Permission::firstOrCreate(['name' => 'approve-reports']);
        Permission::firstOrCreate(['name' => 'manage-members']);
        Permission::firstOrCreate(['name' => 'submit-feedback']);
        Permission::firstOrCreate(['name' => 'view-feedback']);

        // BBF-specific permissions
        Permission::firstOrCreate(['name' => 'submit-bbf-claim']);          
        Permission::firstOrCreate(['name' => 'view-subcounty-claims']);     
        Permission::firstOrCreate(['name' => 'approve-subcounty-claims']);  
        Permission::firstOrCreate(['name' => 'view-all-subcounty-claims']); 
        Permission::firstOrCreate(['name' => 'approve-bec-claims']);        
        Permission::firstOrCreate(['name' => 'view-all-claims']);           
        Permission::firstOrCreate(['name' => 'manage-subcounty-bbf-reps']); // add/edit/delete subcounty reps

        // NEW: Approve BBF Membership
        Permission::firstOrCreate(['name' => 'approve-bbf-membership']); // approve teachers who registered

        // -----------------------------
        // Assign Permissions to Roles
        // -----------------------------
        $superAdmin->syncPermissions(Permission::all());

        $executive->syncPermissions([
            'manage-users',
            'manage-events',
            'view-reports',
            'approve-reports',
            'manage-members',
            'view-all-claims',            
            'view-subcounty-claims',      
            'approve-subcounty-claims',   
            'approve-bec-claims',         
            'manage-subcounty-bbf-reps',
            'approve-bbf-membership',      // can approve BBF membership
        ]);

        $official->syncPermissions([
            'view-reports',
            'submit-feedback',
            'view-feedback',
            'submit-bbf-claim',
        ]);

        $subCountyBbfRep->syncPermissions([
            'view-subcounty-claims',      
            'approve-subcounty-claims',   
            'view-all-subcounty-claims',  
        ]);

        $becBbf->syncPermissions([
            'view-subcounty-claims',      
            'approve-bec-claims',         
            'view-all-subcounty-claims',  
        ]);

        $this->command->info('Roles and BBF membership permissions seeded successfully!');
    }
}