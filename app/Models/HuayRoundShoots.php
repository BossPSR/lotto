<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HuayRoundShoots extends Model
{
    use SoftDeletes;

    protected $table = "huay_round_shoots";
    protected $fillable = [];
    protected $dates = ['deleted_at'];
}