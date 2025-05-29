<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychicAddress extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'psychic_id',
        'address_line_1',
        'address_line_2',
        'city',
        'country_id',
        'show_city',
        'show_country'
    ];
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Get the psychic that owns the address.
     */
    public function psychic()
    {
        return $this->belongsTo(Psychic::class);
    }

    /**
     * Get the country that owns the address.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
