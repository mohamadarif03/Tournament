<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'logo', 'slug'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'games';

    public function team()
    {
        return $this->hasMany(Team::class);
    }

}
