<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HuayRoundPoys extends Model
{
    use SoftDeletes;

    protected $table = "huay_round_poys";
    protected $fillable = [];
    protected $dates = ['deleted_at'];
}
