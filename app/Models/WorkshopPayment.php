<?php

namespace App\Models;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkshopPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workshop_id',
        'transaction_id',
        'status',
        'amount',
        'payment_response',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }

    public function scopeCompleted($query)
    {
        $query->where('status', 'created');
    }

    public function getDisplayAmountAttribute(): string
    {
        return currencySymbol($this->currency) . ' ' . $this->amount;
    }
}
