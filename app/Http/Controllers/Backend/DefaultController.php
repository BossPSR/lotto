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
        );
    }

    public function getData()
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
