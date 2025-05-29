<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'logo',
        'maintenance_mode',
        'maintenance_message',
        'registration_disabled',
        'registration_message',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
        'registration_disabled' => 'boolean',
    ];
} 