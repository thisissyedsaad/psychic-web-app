<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Psychic extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'profile_name',
        'email',
        'profile_photo',
        'tagline',
        'mobile_number',
        'whatsapp_number',
        'profile_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'website',
        'website_title',
        'slug',
    ];

    public function setProfileNameAttribute($value)
    {
        $this->attributes['profile_name'] = $value;
        $baseSlug = Str::slug($value . ' ' . $this->id);
        $slug = $baseSlug;
        $counter = 1;

        // Keep checking until we find a unique slug
        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $this->attributes['slug'] = $slug;
    }

    public function appLinks()
    {
        return $this->hasMany(PsychicAppLink::class);
    }

    public function paymentLinks()
    {
        return $this->hasMany(PsychicPaymentLink::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(PsychicSocialLink::class);
    }

    public function services()
    {
        return $this->belongsToMany(PsychicService::class, 'psychic_psychic_service');
    }

    public function address()
    {
        return $this->hasOne(PsychicAddress::class);
    }
}
