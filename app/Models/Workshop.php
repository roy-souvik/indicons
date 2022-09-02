<?php

namespace App\Models;

use App\Models\WorkshopPayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workshop extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'desctiption',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(WorkshopPayment::class);
    }
}
