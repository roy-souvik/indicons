<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_KEYS = [
        'doctor',
        'nurs_and_paramedic',
        'student',
        'international_deligate',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'email',
        'password',
        'role_id',
        'image',
        'phone',
        'company',
        'postal_code',
        'city',
        'country',
        'department',
        'address',
        'vaicon_member_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getDisplayRoles(): array
    {
        $roles = [];

        foreach (self::ROLE_KEYS as $key) {
            $roles[$key] = ucwords(Str::replace('_', ' ', $key));
        }

        return $roles;
    }

    public function isSuperAdmin(): bool
    {
        return $this->role_id === Role::ROLE_SUPER_ADMIN;
    }

    public function getRoleShortNames(): array
    {
        $shortNames = [];

        foreach (self::ROLE_KEYS as $key) {
            $value = $key;

            if ($key === self::ROLE_KEYS[1]) {
                $value = 'nur_para'; // Nurses and paramedics
            } elseif ($key === self::ROLE_KEYS[3]) {
                $value = 'int_del'; // international deligate
            } else {
                $value = Str::substr($value, 0, 2);
            }

            $shortNames[$key] = $value;
        }

        return $shortNames;
    }

    /**
     * Get the user's registration id.
     *
     * @param string $value
     * @return string
     */
    public function getRegistrationIdAttribute(): string
    {
        $rolePrefix = $this->role->key;

        return "{$rolePrefix}_000{$this->id}";
    }

    public function getDisplayName()
    {
        return "{$this->title}. {$this->name}";
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function companions(): HasMany
    {
        return $this->hasMany(AccompanyingPerson::class);
    }

    public function isSaarcResident(): bool
    {
        $saarcCountries = [
            'Bangladesh',
            'Bhutan',
            // 'India',
            'Maldives',
            'Nepal',
            'Pakistan',
            'Sri Lanka',
            'Afghanistan',
        ];

        return in_array($this->country, $saarcCountries);
    }
}
