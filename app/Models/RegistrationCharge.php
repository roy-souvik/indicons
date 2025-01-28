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

    public function getPayableAmount(): int
    {
        return $this->amount - $this->discount;
    }
}
