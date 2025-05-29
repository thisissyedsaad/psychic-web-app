<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppLink;

class AppLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apps = [
            [
                'app_name' => 'Live Psychic Chat',
                'url_prefix' => 'https://livepsychicchatapp.com/psychics/',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'app_name' => 'Psychics LV',
                'url_prefix' => 'https://psychics.lv/live-chat/',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'app_name' => 'Psychic Sutra',
                'url_prefix' => 'https://psychicsutra.com/live-chat/',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        AppLink::insert($apps);
    }
} 