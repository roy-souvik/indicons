<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSponsorship extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'user_sponsorships';

    protected $fillable = [
        'user_id',
        'sponsorship_id',
        'is_active',
    ];
}
