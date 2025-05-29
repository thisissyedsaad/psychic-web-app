<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychicSocialLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'psychic_id',
        'social_media_link_id',
        'value'
    ];

    public function psychic()
    {
        return $this->belongsTo(Psychic::class);
    }

    public function socialMediaLink()
    {
        return $this->belongsTo(SocialMediaLink::class);
    }
} 