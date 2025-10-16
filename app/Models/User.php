<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'delegate_type_id',
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

    public function isSuperAdmin(): bool
    {
        return $this->role_id === Role::ROLE_SUPER_ADMIN;
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

    public function getDisplayName(): string
    {
        return !empty($this->title)
            ? "{$this->title}. {$this->name}"
            : $this->name;
    }

    public function getDisplayId(): string
    {
        return "User-00{$this->id}";
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function companions(): HasMany
    {
        return $this->hasMany(AccompanyingPerson::class);
    }

    public function workshops(): BelongsToMany
    {
        return $this->belongsToMany(Workshop::class, 'workshop_users', 'user_id', 'workshop_id')
            ->withPivot('payment_id');
    }

    public function workshopPayments(): HasMany
    {
        return $this->hasMany(WorkshopPayment::class);
    }

    public function conferencePayments(): HasMany
    {
        return $this->hasMany(ConferencePayment::class);
    }

    public function isIndian(): bool
    {
        return $this->delegate_type_id === 1;
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

    /**
     * For some roles the provison to add companions from the user-profile is not allowed
     */
    public function isCompanionsAllowed(): bool
    {
        return !in_array($this->role_id, [
            Role::ROLE_SUPER_ADMIN,
            Role::ROLE_SPONSOR,
            Role::ROLE_WORKSHOP_ATTENDEE,
        ]);
    }
}
