<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HuayUns extends Model
{
    protected $table = "huay_uns";
    protected $fillable = ['id'];
    protected $dates = ['deleted_at'];
}
