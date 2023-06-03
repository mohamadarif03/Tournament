<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['tournament_id', 'team_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
}
