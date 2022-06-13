<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function Role(): Role
    {
        return Role::where('id', $this->getOriginal('pivot_role_id'))->first();
    }

    public function Terms(): BelongsToMany
    {
        return $this->belongsToMany(
            Term::class,
            'term_user',
            'user_id',
            'term_id'
        )->withPivot('id', 'role_id');
    }


    public function Participants(): HasMany
    {
        return $this->hasMany(
            Participant::class,
            'user_id'
        );
    }


    public function CoinsLogs()
    {
        return $this->hasMany(
            CoinsLog::class,
            'user_id'
        );
    }
}
