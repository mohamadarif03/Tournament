<?php

namespace App\Models;

use App\Base\Interfaces\HasGame;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tournament extends Model implements HasGame
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'description', 'user_id', 'live_image_url', 'completed_at', 'is_open_signup', 'slot', 'price_pool', 'game_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'tournaments';

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
