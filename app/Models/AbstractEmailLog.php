<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbstractEmailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'abstract_id',
        'sender_id',
        'recipient_email',
        'sender_ip',
    ];
}
