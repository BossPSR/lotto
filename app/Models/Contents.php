<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes;

    protected $table = "contents";
    protected $fillable = [
        'title', 
        'description', 
    ];
    protected $dates = ['deleted_at'];
}
