<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
