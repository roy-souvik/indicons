<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceAbstract extends Model
{
    use HasFactory;

    protected $table = 'abstracts';

    protected $fillable = [
        'user_id',
        'heading',
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
}
