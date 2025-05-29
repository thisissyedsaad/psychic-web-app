<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychicAppLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'psychic_id',
        'app_link_id',
        'value'
    ];

    public function psychic()
    {
        return $this->belongsTo(Psychic::class);
    }

    public function appLink()
    {
        return $this->belongsTo(AppLink::class);
    }
} 