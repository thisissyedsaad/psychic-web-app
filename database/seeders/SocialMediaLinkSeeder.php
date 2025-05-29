<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialMediaLink;

class SocialMediaLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'social_site' => 'Instagram',
                'url_prefix' => 'https://instagram.com',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'social_site' => 'TikTok',
                'url_prefix' => 'https://tiktok.com',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'social_site' => 'YouTube',
                'url_prefix' => 'https://youtube.com',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        SocialMediaLink::insert($socialLinks);
    }
}
