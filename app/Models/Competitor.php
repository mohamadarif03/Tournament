<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competitor extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['tournament_id', 'team_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';

    /**
     * One-to-Many relationship with Game Model
     *
     * @return BelongsTo
     */

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

     /**
     * One-to-Many relationship with Game Model
     *
     * @return BelongsTo
     */

    //  public function tournament(): BelongsTo
    //  {
    //      return $this->belongsTo(Tournament::class);
    //  }
}
