<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRounds;
use App\Models\User;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class ChitHuayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($request->get_number_list)) {
            $wrap = array();
            $numbers = HuayRoundPoyNumbers::where('huay_round_poy_id', $request->huay_round_poy_id)->get();
            if ($numbers) {
                foreach ($numbers as $key => $value) {
                    if (!isset($wrap[$value->huay_type]))
                        $wrap[$value->huay_type] = array();

                    if ($value->is_won == 1) {
                        $value->total_price_txt = number_format($value->total_price, 2);
                    } else if ($value->is_won == -1) {
                        $value->total_price_txt = number_format(0, 2);
                    } else {
                        $value->total_price_txt = number_format(0, 2);
                    }

                    $value->multiple_txt = number_format($value->multiple, 2);

                    array_push($wrap[$value->huay_type], $value);
                }
            }
            return response()->json($wrap, 200);
        }
    }

    public function index()
    {
        $_GET['category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $_GET['start_date'] = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d');
        $_GET['end_date'] = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

        $huays = DB::table('huays')
            ->join('huay_categorys', 'huays.huay_category_id', '=', 'huay_categorys.id')
            ->select('huays.*', 'huay_categorys.name as category_name')
            ->get();

        $huay_categorys = DB::table('huay_categorys')
            ->get();

        if ($_GET['category_id']) {
            $poys = DB::table('huay_round_poys')
                ->whereBetween('huay_round_poys.created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))
                ->where('huay_category_id', $_GET['category_id'])
                ->where('is_my_poy', 0)
                ->join('huay_categorys', 'huay_round_poys.huay_category_id', '=', 'huay_categorys.id')
                ->select('huay_round_poys.*', 'huay_categorys.name as category_name')
                ->get();
        } else {
            $poys = DB::table('huay_round_poys')
                ->whereBetween('huay_round_poys.created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))
                ->where('is_my_poy', 0)
                ->join('huay_categorys', 'huay_round_poys.huay_category_id', '=', 'huay_categorys.id')
                ->select('huay_round_poys.*', 'huay_categorys.name as category_name')
                ->get();
        }
        
        if ($poys) {
            $poy_id_all = array();
            $huay_round_id_all = array();
            $user_id_all = array();
            foreach ($poys as $value) {
                array_push($poy_id_all, $value->id);
                array_push($huay_round_id_all, $value->huay_round_id);
                array_push($user_id_all, $value->user_id);
            }

            $huay_rounds = HuayRounds::whereIn('id', $huay_round_id_all)->get();

            $huay_round_by_id = array();
            if ($huay_rounds) {
                foreach ($huay_rounds as $value) {
                    $huay_round_by_id[$value->id] = $value;
                }
            }

            $users = User::whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($users) {
                foreach ($users as $value) {
                    $user_by_id[$value->id] = $value;
                }
            }

            foreach ($poys as $index => $poy) {
                $poys[$index]->user_info = isset($user_by_id[$poy->user_id]) ? $user_by_id[$poy->user_id] : array();
                $poys[$index]->round_info = isset($huay_round_by_id[$poy->huay_round_id]) ? $huay_round_by_id[$poy->huay_round_id] : array();
                $poys[$index]->datetime = date('d/m/Y H:i:s', strtotime($poy->created_at));
                $poys[$index]->code = 'PY' . sprintf('%04d', $poy->id);
            }
        }

        $data = array(
            'poys' => $poys,
            'huays' => $huays,
            'huay_categorys' => $huay_categorys
        );
        return view('backend.chit_huay.huay.huay_chit', $data);
    }
}
