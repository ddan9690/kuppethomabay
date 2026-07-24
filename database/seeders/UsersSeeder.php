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

        // Add Ann Blessing
        $ann = User::firstOrCreate(
            ['email' => 'annblessing@kuppethomabay'],
            [
                'salutation' => 'Mrs.',
                'name' => 'Ann Blessing',
                'phone' => '0790407571',
                'tsc_no' => null,
                'password' => Hash::make('kuppethomabay'),
                'active' => true,
                'email_verified_at' => now(),
            ]
        );
        $ann->assignRole('executive');

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

        // Sub-County Welfare Representatives
        $subCountyReps = [
            ['name' => 'Alex Benard', 'phone' => '0721915328'],
            ['name' => 'Felix Okoth', 'phone' => '0700812430'],
            ['name' => 'Merceline Okeyo', 'phone' => '0722393161'],
            ['name' => 'Hawkins Opiyo', 'phone' => '0716022612'],
            ['name' => 'Collins Omondi', 'phone' => '0713867413'],
            ['name' => 'Vincent Adika', 'phone' => '0727071771'],
            ['name' => 'Michael Okiki', 'phone' => '0729065222'],
            ['name' => 'Victor Arogo', 'phone' => '0757201890'],
            ['name' => 'Collins Onuong\'a', 'phone' => '0705535559'],
            ['name' => 'Agutu Bonface', 'phone' => '0739852371'],
            ['name' => 'Erick Angudha', 'phone' => '0718733849'],
            ['name' => 'Cliford Ogalo', 'phone' => '0799718682'],
            ['name' => 'George Odhiambo', 'phone' => '0705471234'],
            ['name' => 'Erick Ojiem', 'phone' => '0703920827'],
            ['name' => 'Geoffrey Mache', 'phone' => '0707958213'],
            ['name' => 'Addah Akoth', 'phone' => '0718507761'],
            ['name' => 'Corazon Aquino', 'phone' => '0728281374'],
            ['name' => 'George Ogola', 'phone' => '0729521162'],
            ['name' => 'Kevins Magolo', 'phone' => '0729418484'],
            ['name' => 'Aphline Waoh', 'phone' => '0757571082'],
            ['name' => 'Bonface Ogana', 'phone' => '0717645014'],
            ['name' => 'Philip Ogwe', 'phone' => '0701366038'],
            ['name' => 'Joram Owigo', 'phone' => '0703622576'],
            ['name' => 'Wayoga Raphael', 'phone' => '0727089026'],
        ];

        foreach ($subCountyReps as $rep) {
            $email = strtolower(str_replace(' ', '', $rep['name'])) . '@kuppethomabay';

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'salutation' => 'Mr./Madam',
                    'name' => $rep['name'],
                    'phone' => $rep['phone'],
                    'tsc_no' => null,
                    'password' => Hash::make('kuppethomabay'),
                    'active' => true,
                    'email_verified_at' => now(),
                ]
            );

            $user->assignRole('subcounty-bbf-rep');
        }

        $this->command->info('Governance and sub-county rep users seeded successfully.');
    }
}