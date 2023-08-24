<?php

namespace App\Models;

use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompetitorRegistrant extends Model implements HasUser
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['tournament_id', 'competitor_id', 'user_id', 'position'];
    protected $primaryKey = 'id';
    public $keyType = 'char';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function competitor_registers(): BelongsTo
    {
        return $this->belongsTo(Competitor::class);
    }

}
