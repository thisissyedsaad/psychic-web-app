<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PsychicService extends Model
{
    protected $fillable = [
        'service',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'description',
        'logo',
        'slug',
    ];

    public function setServiceAttribute($value)
    {
        $this->attributes['service'] = $value;
        $baseSlug = Str::slug($value . ' ' . $this->id, '-');
        $slug = $baseSlug;
        $counter = 1;

        // Keep checking until we find a unique slug
        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $this->attributes['slug'] = $slug;
    }

    public function psychics()
    {
        return $this->belongsToMany(\App\Models\Psychic::class, 'psychic_psychic_service');
    }
}