<?php

namespace App\Models;

use App\Base\Interfaces\HasGame;
use App\Base\Interfaces\HasOpenTrials;
use App\Base\Interfaces\HasTeamPlayers;
use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model implements HasGame, HasUser, HasOpenTrials
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'logo', 'description', 'user_id', 'game_id'];
    protected $primaryKey = 'id';
    protected $table = 'teams';

    /**
     * One-to-Many relationship with Game Model
     *
     * @return BelongsTo
     */

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * One-to-Many relationship with User Model
     *
     * @return BelongsTo
     */

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    /** 
     * One-to-Many relationship with User Model
     *
     * @return HasMany
     */

     public function openTrials(): HasMany
     {
        return $this->hasMany(OpenTrial::class);
        
     }
     
}
