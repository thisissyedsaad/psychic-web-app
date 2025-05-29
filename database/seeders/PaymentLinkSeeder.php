<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentLink;

class PaymentLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentLinks = [
            [
                'payment_provider' => 'PayPal',
                'url_prefix' => 'https://paypal.me',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_provider' => 'Cash App',
                'url_prefix' => 'https://cash.app',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_provider' => 'Venmo',
                'url_prefix' => 'https://venmo.com',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PaymentLink::insert($paymentLinks);
    }
} 