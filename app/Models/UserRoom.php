<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRoom extends Model
{
    use HasFactory;

    protected $table = 'user_rooms';

    protected $fillable = [
        'user_id',
        'room_id',
        'room_count',
        'amount',
        'transaction_id',
        'is_active',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
