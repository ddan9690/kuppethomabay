<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'dancan@kuppethomabay'],
            [
                'salutation' => 'Mr.',
                'name' => 'Dancan Okeyo',
                'phone' => '0711317235',
                'tsc_no' => '752272',
                'password' => Hash::make('jamadata'),
                'active' => true,
                'email_verified_at' => now(),
            ]
        );
        $superAdmin->assignRole('super-admin');

        // Executive
        $executive = User::firstOrCreate(
            ['email' => 'churchil@kuppethomabay'],
            [
                'salutation' => 'Mr.',
                'name' => 'Churchil Aroko',
                'phone' => '0711317235',
                'tsc_no' => '752272',
                'password' => Hash::make('jamadata'),
                'active' => true,
                'email_verified_at' => now(),
            ]
        );
        $executive->assignRole('executive');

        // Official
        $official = User::firstOrCreate(
            ['email' => 'ann@kuppethomabay'],
            [
                'salutation' => 'Mrs.',
                'name' => 'Ann Blessing',
                'phone' => '0711317235',
                'tsc_no' => null,
                'password' => Hash::make('jamadata'),
                'active' => true,
                'email_verified_at' => now(),
            ]
        );
        $official->assignRole('official');

        $this->command->info('Default users seeded with roles!');
    }
}