<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'logo', 'description', 'game_id'];
    protected $primaryKey = 'id';
    protected $table = 'teams';

    public function game()
    {
        return $this->BelongsTo(Game::class, 'game_id', 'id');
    }
}
