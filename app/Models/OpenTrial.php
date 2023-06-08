<?php

namespace App\Models;

use App\Base\Interfaces\HasTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpenTrial extends Model implements HasTeam
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['team_id', 'desc', 'close_registration', 'location', 'salary'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trials';

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
