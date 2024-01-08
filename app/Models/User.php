<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'first_name',
        'last_name',
        'name',
        'email',
        'type',
        'password',
        'phone_iso2',
        'phone_dial_code',
        'phone_number',
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
        'password' => 'hashed',
    ];

    /**
     * Checks if user is an admin.
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->type == 'admin';
    }

    /**
     * Checks if user is an student.
     * @return bool
     */
    public function isStudent(): bool
    {
        return $this->type == 'student';
    }

    /**
     * Checks if user is an teacher.
     * @return bool
     */
    public function isTeacher(): bool
    {
        return $this->type == 'teacher';
    }

    /**
     * Checks if user is an parent.
     * @return bool
     */
    public function isParent(): bool
    {
        return $this->type == 'parent';
    }

    /* Address relationship */
    public function address(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Addresses::class);
    }

    /* Short-bio relationship */
    public function bio(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ShortBios::class);
    }

    
}
