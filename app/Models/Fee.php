<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Role;

class Fee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'event',
        'currency',
        'early_bird_amount',
        'standard_amount',
        'spot_amount',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
