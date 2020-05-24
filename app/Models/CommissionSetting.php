<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CommissionSetting extends Model
{
    use SoftDeletes;

    protected $table = "commission_setting";
    protected $fillable = [
    ];
    protected $dates = ['deleted_at'];

    function __construct()
    {
        $has_setting = DB::table('commission_setting')->get('id');

        if (count($has_setting) == 0) {
            $data = array(
                'commission_percent' => 0.00,
                'max_withdraws' => 0.00,
            );
            DB::table('commission_setting')->insert($data);
        }
    }
}