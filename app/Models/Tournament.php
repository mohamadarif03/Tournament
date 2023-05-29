<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'description', 'user_id', 'live_image_url', 'completed_at', 'is_open_signup', 'slot', 'price_pool'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'tournaments';
}
