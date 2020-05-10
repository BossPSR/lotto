<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerRules extends Model
{
    use SoftDeletes;

    protected $table = "player_rules";
    protected $fillable = [
        'title', 
        'description', 
        'image', 
    ];
    protected $dates = ['deleted_at'];
}
