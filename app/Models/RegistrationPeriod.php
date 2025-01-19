<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationPeriod extends Model
{
    use HasFactory;

    protected $table = 'registration_periods';

    protected $fillable = [
        'name',
        'date',
        'is_active',
    ];
}
