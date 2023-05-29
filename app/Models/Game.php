<?php

namespace App\Models;

use App\Base\Interfaces\HasTeams;
use App\Base\Interfaces\HasTournament;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model implements HasTeams, HasTournament
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'logo', 'slug'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'games';

    public function team(): HasMany
    {
        return $this->hasMany(Team::class);
    }
    public function tournament(): HasMany
    {
        return $this->hasMany(Team::class);
    }

}
