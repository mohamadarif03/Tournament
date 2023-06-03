<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitorRegistrant extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['tournament_id', 'competitor_id', 'user_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
}
