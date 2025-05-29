<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLink extends Model
{
    protected $fillable = [
        'social_site',
        'url_prefix',
        'logo'
    ];
} 