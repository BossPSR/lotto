<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banks extends Model
{
    use SoftDeletes;

    protected $table = "banks";
    protected $fillable = [
        'bank_name', 
        'account_no', 
        'account_name', 
    ];
    protected $dates = ['deleted_at'];
}
