<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRegistration extends Model
{
    use HasFactory;

    /**
     * Get the user's registration id.
     *
     * @param string $value
     * @return string
     */
    public function getRegistrationIdAttribute(): string
    {
        $rolePrefix = 'admin';

        return "{$rolePrefix}_000{$this->id}";
    }
}
