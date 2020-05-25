<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use SoftDeletes;

    protected $table = "transactions";
    protected $fillable = [
    ];
    protected $dates = ['deleted_at'];
}
