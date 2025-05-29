<?php

namespace Database\Seeders;

use App\Models\CategoryPrice;
use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UserHasRoleSeeder::class,
            PsychicServiceSeeder::class,
            PsychicSeeder::class,
            AppLinkSeeder::class,
            PaymentLinkSeeder::class,
            SocialMediaLinkSeeder::class,
            CountrySeeder::class,
        ]);
    }
}
