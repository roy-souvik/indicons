<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RegistrationPeriod extends Model
{
    use HasFactory;

    protected $table = 'registration_periods';

    protected $fillable = [
        'name',
        'date',
        'is_active',
    ];

    /**
     * Scope for active periods.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * Get a specific registration period by ID.
     */
    public static function getById(int $id)
    {
        return self::active()->where('id', $id)->first();
    }

    /**
     * Get the date as a Carbon instance.
     */
    public function getDateAsCarbon()
    {
        return $this->date ? Carbon::createFromFormat('Y-m-d', $this->date) : null;
    }

    /**
     * Determine the current registration period.
     */
    public static function getCurrentPeriod(): RegistrationPeriod
    {
        $periods = self::active()->get();

        $earlyBird = $periods->where('id', 1)->first();
        $standard = $periods->where('id', 2)->first();
        $late = $periods->where('id', 3)->first();
        $spot = $periods->where('id', 4)->first();

        $earlyBirdDate = $earlyBird?->getDateAsCarbon();
        $standardDate = $standard?->getDateAsCarbon();
        $lateDate = $late?->getDateAsCarbon();

        if ($earlyBirdDate && !$earlyBirdDate->isPast()) {
            return $earlyBird;
        } elseif ($standardDate && !$standardDate->isPast()) {
            return $standard;
        } elseif ($lateDate && !$lateDate->isPast()) {
            return $late;
        }

        return $spot;
    }
}
