<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'title',
        'currency',
        'amount',
        'color',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(SponsorshipFeature::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(SponsorshipPayment::class);
    }
}
