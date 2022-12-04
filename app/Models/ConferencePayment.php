<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'pickup_drop',
        'airplane_booking',
        'payment_title',
        'coupon_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCompleted($query)
    {
        $query->where('status', 'created');
    }

    public function accommodations(): HasMany
    {
        return $this->hasMany(UserRoom::class, 'transaction_id', 'transaction_id');
    }

    public function coupon(): HasOne
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }
}
