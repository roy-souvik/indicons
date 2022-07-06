<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorshipPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sponsorship_id',
        'transaction_id',
        'status',
        'amount',
        'payment_response',
    ];
}
