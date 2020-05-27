<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class HuayRounds extends Model
{

    use SoftDeletes;

    protected $table = "huay_rounds";
    protected $fillable = [
        'huay_category_id',
        'huay_id',
        'date',
        'start_time',
        'end_time',
        'start_datetime',
        'end_datetime',
        'name',
        'is_active',
        'price_tree_up',
        'price_tree_tod',
        'price_tree_front',
        'price_tree_down',
        'price_two_up',
        'price_two_down',
        'price_run_up',
        'price_run_down',
        'result_tree_up',
        'result_tree_tod',
        'result_tree_front',
        'result_tree_down',
        'result_two_up',
        'result_two_down',
        'result_run_up',
        'result_run_down',
    ];
    protected $dates = ['deleted_at'];

    function __construct()
    {
        $huay_round_need_to_stops = DB::table($this->table)->where('is_active', 1)->where('end_datetime', '<', date('Y-m-d H:i:s'))->get('id');
        if (count($huay_round_need_to_stops)) {
            $id_all = array();
            foreach ($huay_round_need_to_stops as $info)
                array_push($id_all, $info->id);

            $data = array(
                'is_active' => 0,
                'round_status' => 'close',
            );
            DB::table($this->table)
                ->where('id', $id_all)
                ->update($data);
        }
    }
}
