<?php

namespace App\Models;

use App\Base\Interfaces\HasOpenTrialQuestions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OpenTrialAnswer extends Model implements HasOpenTrialQuestions
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['answer', 'open_trial_question_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trial_answers';

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
