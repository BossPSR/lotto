<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    private static $allow_table;

    public function __construct()
    {
        $this->middleware('auth:admin');

        $this::$allow_table = array(
            md5('get-contents') => 'contents',
            md5('get-player_rules') => 'player_rules',
            md5('get-banks') => 'banks',
            md5('get-contacts') => 'contacts',
            md5('get-deposits') => 'deposits',
            md5('get-withdraws') => 'withdraws',
            md5('get-admins') => 'admins',
            md5('get-users') => 'users',
            md5('get-huays') => 'huays',
            md5('get-huay_rounds') => 'huay_rounds',
            md5('get-commission_setting') => 'commission_setting',
            md5('get-transactions') => 'transactions',
        );
    }

    public function get_data()
    {
        $allow_table = $this::$allow_table;

        // CHECK TABLE
        if (!isset($allow_table[$_POST['target_secret']]))
            return response()->json(array('process-error' => "can't vertify"), 422);

        $table = $allow_table[$_POST['target_secret']];
        $source = DB::table($table)->where('id', $_POST['get-id'])->first();

        return response()->json($source, 200);
    }
}
