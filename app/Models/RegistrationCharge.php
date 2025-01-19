<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationCharge extends Model
{
    use HasFactory;

    protected $table = 'registration_charges';

    protected $fillable = [
        'category',
        'type',
        'registration_period',
        'amount',
    ];

    public static function getByType(string $type)
    {
        return self::where('type', strtoupper($type))->orderBy('registration_period')->get();
    }
}
