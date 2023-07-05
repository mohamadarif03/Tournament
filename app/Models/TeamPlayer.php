<?php

namespace App\Models;

use App\Base\Interfaces\HasTeam;
use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamPlayer extends Model implements HasUser, HasTeam
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['team_id', 'user_id'];
    protected $primaryKey = 'id';
    protected $table = 'team_players';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
        
    }
}
