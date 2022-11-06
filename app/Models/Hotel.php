<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Room;

class Hotel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
