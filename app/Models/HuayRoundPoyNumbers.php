<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HuayRoundPoyNumbers extends Model
{
    use SoftDeletes;

    protected $table = "huay_round_poy_numbers";
    protected $fillable = [];
    protected $dates = ['deleted_at'];
}
