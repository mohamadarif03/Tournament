<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamOpenTrial extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'email', 'phone_number', 'cv'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'team_open_trials';
}
