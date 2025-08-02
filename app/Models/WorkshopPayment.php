<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function workshopUsers(): HasMany
    {
        return $this->hasMany(WorkshopUser::class, 'payment_id', 'id');
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
