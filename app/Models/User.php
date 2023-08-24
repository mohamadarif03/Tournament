<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Base\Interfaces\HasTeamPlayers;
use App\Base\Interfaces\HasTeams;
use App\Base\Interfaces\HasTournaments;
use App\Notifications\RegistrationNotification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword, HasTournaments, HasTeams, HasTeamPlayers
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    public $incrementing = false;
    protected $keyType = 'char';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',

    ];
    /**
     * One-to-Many relationship with Team Model
     *
     * @return HasMany
     */
    public function team(): HasMany
    {
        return $this->hasMany(Team::class);
    }
    /**
     * One-to-Many relationship with Team Model
     *
     * @return HasMany
     */
    public function tournament(): HasMany
    {
        return $this->hasMany(Tournament::class);
    }
    /**
     * One-to-Many relationship with Team Model
     *
     * @return HasMany
     */
    public function teamPlayers(): HasMany
    {
        return $this->hasMany(TeamPlayer::class);
    }

    /**
     * One-to-Many relationship with Team Model
     *
     * @return HasMany
     */
    public function competitor_registers(): HasMany
    {
        return $this->hasMany(CompetitorRegistrant::class);
    }

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
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new RegistrationNotification);
    }
}
