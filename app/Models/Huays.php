<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Huays extends Model
{
    use SoftDeletes;

    protected $table = "huays";
    protected $fillable = ['id'];
    protected $dates = ['deleted_at'];
}
