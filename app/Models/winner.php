<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class winner extends Model
{
    protected $fillable = [
        'tournament_id',
        // other fillable attributes...
    ];
}
