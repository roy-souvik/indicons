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

    public static function getByTypeId(int $typeId)
    {
        return self::where('delegate_type_id', $typeId)->get();
    }
}
