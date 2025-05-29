<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLink extends Model
{
    protected $fillable = [
        'payment_provider',
        'url_prefix',
        'logo',
    ];
} 