<?php

namespace App\Models;

use App\Base\Interfaces\HasGame;
use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tournament extends Model implements HasGame, HasUser
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'description', 'user_id', 'live_image_url', 'completed_at', 'is_open_signup', 'slot', 'price_pool', 'game_id', 'starter_at'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'tournaments';

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
