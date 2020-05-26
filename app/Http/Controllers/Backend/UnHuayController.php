<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HuayCategorys;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayUns;
use File;
use Auth;

class UnHuayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($request->get_number_list)) {
            $wrap = array();
            $numbers = HuayUns::where('huay_category_id', $request->huay_category_id)->get();
            if ($numbers) {
                foreach ($numbers as $key => $number) {
                    if ($key == 0)
                        $numbers[$key]->can_delete = 0;
                    else
                        $numbers[$key]->can_delete = 1;
                    $numbers[$key]->number_length = strlen($numbers[$key]->number);
                }
            }
            return response()->json($numbers, 200);
        } else if (isset($request->add_huay_category_un)) {

            HuayUns::where('huay_category_id', $request->huay_category_id)->delete();

            $number_array = array();
            foreach ($request->number_array as $info) {
                $number = new HuayUns();
                $number->huay_category_id = $request->huay_category_id;
                $number->huay_type = $info['huay_type'];
                $number->number = $info['number'];
                $number->max_price = $info['max_price'];
                $number->save();
                array_push($number_array, $info['number']);
            }

            // $update = array('is_un' => 0);

            // HuayRoundPoyNumbers::where('huay_category_id', $request->huay_category_id)->where('is_un', 1)->where('is_won', -1)->update($update);
            // if ($number_array)
            //     HuayRoundPoyNumbers::where('huay_category_id', $request->huay_category_id)->where('is_won', -1)->whereIn('number', $number_array)->update(['is_un' => 0]);
            return response()->json(true, 200);
        } else if (isset($request->clear_huay_uns)) {
            $numbers = HuayUns::where('huay_category_id', $request->huay_category_id)->delete();
            // HuayRoundPoyNumbers::where('huay_category_id', $request->huay_category_id)->where('is_un', 1)->where('is_won', -1)->update(['is_un'=> 0]);
            return response()->json(true, 200);
        } else
            return response()->json(null, 401);
    }

    public function index()
    {
        $huay_category = HuayCategorys::where('deleted_at', null)->get();
        $data = array(
            'huay_category' => $huay_category,
        );
        return view('backend.un_huay.huay.huay_un', $data);
    }

    public function un_huay_yeekee()
    {
        return view('backend.un_huay.huay_yeekee.huay_yeekee');
    }

    public function un_huay_yeekee_cf()
    {
        return view('backend.un_huay.huay_yeekee_cf.huay_yeekee_cf');
    }
}
