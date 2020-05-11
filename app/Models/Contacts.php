<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use SoftDeletes;

    protected $table = "contacts";
    protected $fillable = [
        'description', 
    ];
    protected $dates = ['deleted_at'];
}
