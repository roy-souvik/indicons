<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    const TYPE_FIXED = 'fixed';
    const TYPE_PERCENT = 'percent';

    protected $fillable = [
        'code',
        'type',
        'value',
        'percent_off',
        'start_date',
        'end_date',
        'is_active',
        'user_id',
    ];

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if ($this->type == self::TYPE_FIXED) {
            return $this->value;
        } elseif ($this->type == self::TYPE_PERCENT) {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }

    public static function generateUniqueCode(): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }

        if (Coupon::where('code', $code)->exists()) {
            self::generateUniqueCode();
        }

        return $code;
    }
}
