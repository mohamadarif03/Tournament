<?php

namespace App\Models;

use App\Base\Interfaces\HasOpenTrial;
use App\Base\Interfaces\HasOpenTrials;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpenTrialQuestion extends Model implements HasOpenTrial
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['question', 'open_trial_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trial_questions';

     /**
     * One-to-Many relationship with User Model
     *
     * @return BelongsTo
     */

     public function openTrial(): BelongsTo
     {
        return $this->belongsTo(OpenTrial::class);
     }

}
