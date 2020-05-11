<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposits extends Model
{
    use SoftDeletes;

    protected $table = "deposits";
    protected $fillable = [
        'banks_id', 
        'user_id', 
        'admin_id', 
        'proof_image', 
        'status', 
        'amount', 
    ];
    protected $dates = ['deleted_at'];
}
