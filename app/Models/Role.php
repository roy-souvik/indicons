<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE_SUPER_ADMIN = 1;
    const ROLE_SPONSOR = 6;
    const ROLE_WORKSHOP_ATTENDEE = 7;

    public $timestamps = false;

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    public function scopeForConference($query)
    {
        $query->whereNotIn('key', [
            'super_admin',
            'accompanying_person',
            'sponsor',
            'workshop_attendee',
        ]);
    }

    public function isCompanion(): bool
    {
        return $this->key === 'accompanying_person';
    }

    public function isStudent(): bool
    {
        return $this->key === 'ug_nurse';
    }
}
