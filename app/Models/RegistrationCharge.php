<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationPeriod;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationCharge extends Model
{
    use HasFactory;

    protected $table = 'registration_charges';

    protected $fillable = [
        'category',
        'type',
        'registration_period',
        'amount',
        'discount',
    ];

    public static function getByTypeId(int $typeId)
    {
        return self::where('delegate_type_id', $typeId)->get();
    }

    public function registrationPeriod(): BelongsTo
    {
        return $this->belongsTo(RegistrationPeriod::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function delegateType(): BelongsTo
    {
        return $this->belongsTo(DelegateType::class);
    }

    public function getPayableAmount(): int
    {
        return $this->amount - $this->discount;
    }

    public function isPhysicalConference(): bool
    {
        return $this->event === 'physical_conference';
    }

    public function isConferenceAddons(): bool
    {
        return $this->event === 'conference_addons';
    }

    /**
     * Get the amount with currency symbol.
     *
     * @return string
     */
    public function getDisplayAmountAttribute(): string
    {
        return currencySymbol($this->currency) . ' ' . $this->amount;
    }
}
