<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactHeader extends Model
{
    //
    protected $table = "contact_header";
    protected $fillable = [];
    protected $dates = ['deleted_at'];

    function __construct()
    {
        $check = DB::table($this->table)->first();
        if(!$check)
        {
            $sample = array(
                'tel' => 'xxxxxxxxxx',
                'email' => 'xxxxxxxxxx@xxx.com',
            );
            DB::table($this->table)->insert($sample);

            
        }
    }
    
}
