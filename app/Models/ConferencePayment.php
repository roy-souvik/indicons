<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCompleted($query)
    {
        $query->where('status', 'COMPLETED');
    }
}
