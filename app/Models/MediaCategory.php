<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'is_active',
    ];

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }
}
