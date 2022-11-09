<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class AccompanyingPerson extends Model
{
    use HasFactory;

    protected $table = 'accompanying_persons';

    protected $fillable = [
        'user_id',
        'title',
        'name',
        'email',
        'fees',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeConfirmed($query)
    {
        $query->where('confirmed', 1);
    }

    public function getDisplayName(): string
    {
        return !empty($this->title)
            ? "{$this->title}. {$this->name}"
            : $this->name;
    }
}
