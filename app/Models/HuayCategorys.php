<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HuayCategorys extends Model
{
    use SoftDeletes;

    protected $table = "huay_categorys";
    protected $fillable = ['id'];
    protected $dates = ['deleted_at'];
}
