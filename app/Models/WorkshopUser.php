<?php

namespace App\Models;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkshopUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'payment_id',
        'workshop_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }
}
