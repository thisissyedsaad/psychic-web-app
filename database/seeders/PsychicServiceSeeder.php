<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PsychicService;

class PsychicServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service' => 'Love & Relationships',
                'meta_title' => 'Love & Relationship Psychic Readings | Expert Love Psychics',
                'meta_description' => 'Get clarity on your love life with our expert love psychics. Offering insights on relationships, soulmates, and romance. Book your reading today.',
                'meta_keywords' => 'love psychic, relationship reading, soulmate reading, romance psychic, love advice',
                'description' => 'Expert guidance on love and relationships, including soulmate and romance readings.',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Career & Finance',
                'meta_title' => 'Career & Finance Psychic Readings | Professional Guidance',
                'meta_description' => 'Navigate your career path and financial future with our experienced psychics. Get insights on job changes, investments, and business decisions.',
                'meta_keywords' => 'career psychic, financial reading, job guidance, business psychic, money advice',
                'description' => 'Professional advice for your career and financial decisions from experienced psychics.',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Spiritual Guidance',
                'meta_title' => 'Spiritual Guidance & Life Path Readings | Spiritual Advisors',
                'meta_description' => 'Connect with your spiritual path and life purpose through our intuitive readings. Find guidance on your spiritual journey and personal growth.',
                'meta_keywords' => 'spiritual reading, life path, spiritual guidance, meditation, spiritual advisor',
                'description' => 'Find your spiritual path and life purpose with the help of our spiritual advisors.',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PsychicService::insert($services);
    }
} 