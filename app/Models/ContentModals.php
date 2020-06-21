<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentModals extends Model
{
    use SoftDeletes;

    protected $table = "content_modals";
    protected $fillable = [
        'title', 
        'description', 
    ];
    protected $dates = ['deleted_at'];
}
