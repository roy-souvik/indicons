<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferencePayment extends Model
{
    use HasFactory;

    protected $table = 'conference_payments';

    protected $fillable = [
        'user_id',
        'payment_id',
        'status',
        'amount',
        'payment_response',
    ];
}
