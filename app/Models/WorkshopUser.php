<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'workshop_id',
        'user_id',
    ];
}
