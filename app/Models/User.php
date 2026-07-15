<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    use HasFactory, Notifiable, TwoFactorAuthenticatable,HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'lName',
        'email',
        'phone',
        'password',
        'roleType',
        'status',
        // Extra profile fields — added via migration below
        'avatar',
        'address',
        'city',
        'zip',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }
    public function getFullNameAttribute(): string
    {
        return trim("{$this->fName} {$this->lName}");
    }
    public function isAdmin(): bool
    {
        return $this->roleType === 'admin';
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    // ── Relations ─────────────────────────────────────────────────────────────

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function getRolesAttribute()
    {
        return $this->roles()->get();
    }
}
