<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    use HasFactory;

    const STORE_PATH = 'indicons/images/media';
    const TYPE_IMAGE = 1;
    const TYPE_VIDEO = 2;

    protected $fillable = [
        'category_id',
        'type_id',
        'path',
        'title',
        'is_active',
    ];

    public function isImage(): bool
    {
        return $this->type_id === self::TYPE_IMAGE;
    }

    public function isVideo(): bool
    {
        return $this->type_id === self::TYPE_VIDEO;
    }

    public function scopeImage($query)
    {
        $query->where('type_id', self::TYPE_IMAGE);
    }

    public function scopeVideo($query)
    {
        $query->where('type_id', self::TYPE_VIDEO);
    }

    public function getImagePath(): string
    {
        return '/' . self::STORE_PATH . '/' . $this->path;
    }

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(MediaCategory::class, 'category_id', 'id');
    }

    public function isActive(): bool
    {
        return $this->is_active == 1;
    }
}
