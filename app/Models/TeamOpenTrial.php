<?php

namespace App\Models;

use App\Base\Interfaces\HasTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamOpenTrial extends Model implements HasTeam
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'email', 'phone_number', 'cv', 'team_id', 'user_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'team_open_trials';

    /**
     * One-to-Many relationship with User Model
     *
     * @return BelongsTo
     */

     public function team(): BelongsTo
     {
        return $this->belongsTo(Team::class);

     }
}
