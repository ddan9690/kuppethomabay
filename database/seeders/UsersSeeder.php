<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
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

        $organisingSecretary = User::firstOrCreate(
            ['email' => 'churchil@kuppethomabay'],
            [
                'salutation' => 'Mr.',
                'name' => 'Churchil Aroko',
                'phone' => '0700000001',
                'tsc_no' => '752273',
                'password' => Hash::make('jamadata'),
                'active' => true,
                'email_verified_at' => now(),
            ]
        );
        $organisingSecretary->assignRole('organising-secretary');

        $executives = [
            [
                'email' => 'tom@kuppethomabay',
                'name' => 'Tom Odhiambo',
            ],
            [
                'email' => 'peter@kuppethomabay',
                'name' => 'Peter Otieno',
            ],
            [
                'email' => 'tembo@kuppethomabay',
                'name' => 'Tembo Mwadime',
            ],
            [
                'email' => 'felix@kuppethomabay',
                'name' => 'Felix Odiwuor',
            ],
            [
                'email' => 'atanga@kuppethomabay',
                'name' => 'Atanga Kennedy',
            ],
        ];

        foreach ($executives as $exec) {
            $user = User::firstOrCreate(
                ['email' => $exec['email']],
                [
                    'salutation' => 'Mr.',
                    'name' => $exec['name'],
                    'phone' => '0700000000',
                    'tsc_no' => null,
                    'password' => Hash::make('jamadata'),
                    'active' => true,
                    'email_verified_at' => now(),
                ]
            );

            $user->assignRole('executive');
        }

        $this->command->info('Governance users seeded successfully.');
    }
}