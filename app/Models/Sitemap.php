<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitemap extends Model
{
    protected $fillable = [
        'home_frequency',
        'home_priority',
        'static_frequency',
        'static_priority',
        'engines',
    ];

    protected $casts = [
        'engines' => 'array',
        'home_priority' => 'float',
        'static_priority' => 'float',
    ];
} 