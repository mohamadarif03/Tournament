<?php

namespace App\Models;

use App\Base\Interfaces\HasOpenTrialQuestions;
use App\Base\Interfaces\HasOpenTrials;
use App\Base\Interfaces\HasTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OpenTrial extends Model implements HasTeam, HasOpenTrialQuestions
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['team_id', 'desc', 'close_registration', 'location', 'salary'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trials';

    /**
     * One-to-Many relationship with User Model
     *
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * One-to-Many relationship with User Model
     *
     * @return HasMany
     */
    public function openTrialQuestions(): HasMany
    {
        return $this->hasMany(OpenTrialQuestion::class);
    }
}
