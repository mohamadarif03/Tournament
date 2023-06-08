<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTrial extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['team_id', 'desc', 'close_registration', 'location', 'salary'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trials';
}
