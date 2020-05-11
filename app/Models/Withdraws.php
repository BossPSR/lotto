<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdraws extends Model
{
    use SoftDeletes;

    protected $table = "withdraws";
    protected $fillable = [
        'user_id', 
        'admin_id', 
        'proof_image', 
        'status', 
        'bank_name', 
        'account_no', 
        'account_name', 
        'amount', 
    ];
    protected $dates = ['deleted_at'];
}
