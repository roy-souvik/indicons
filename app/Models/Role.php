<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }
}