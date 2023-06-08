<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTrialAnswer extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['answer', 'open_trial_question_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trial_answers';
}
