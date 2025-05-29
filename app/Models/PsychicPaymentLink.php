<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychicPaymentLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'psychic_id',
        'payment_link_id',
        'value',
        'qr_code'
    ];

    public function psychic()
    {
        return $this->belongsTo(Psychic::class);
    }

    public function paymentLink()
    {
        return $this->belongsTo(PaymentLink::class);
    }
} 