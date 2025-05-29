<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppLink extends Model
{
    protected $fillable = [
        'app_name',
        'url_prefix',
        'logo'
    ];
} 