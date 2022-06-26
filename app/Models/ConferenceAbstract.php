<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class ConferenceAbstract extends Model
{
    use HasFactory;

    protected $table = 'abstracts';

    protected $fillable = [
        'user_id',
        'heading',
        'image',
        'theme',
        'co_author',
        'description',
        'statements',
        'qualification',
        'profession',
        'institution',
        'alternate_number',
        'confirmed',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAbstractIdAttribute(): string
    {
        return "ABST_000{$this->id}";
    }
}
