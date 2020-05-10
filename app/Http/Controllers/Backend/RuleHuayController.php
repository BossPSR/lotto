<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\PlayerRules;
use File;
use Auth;
use Illuminate\Support\Facades\DB;


class RuleHuayController extends Controller
{
   
    private static $table = "player_rules";
    private static $view = "admin/rule_huay";

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if(isset($_POST['addPlayerRules']))
        {

            $player_rule = new PlayerRules();
            $player_rule->title = $_POST['title'];
            $player_rule->description = $_POST['description'];

             // Save the model
             $player_rule->save();
        
            $sort_data = array('sort_order_id' => $player_rule->id);
           
            DB::table(self::$table)
            ->where('id', $player_rule->id)
            ->update($sort_data);

            return redirect(self::$view)->with('message', 'เพิ่มข้อมูลสำเร็จ!')->with('status', 'success');
        }
        else if(isset($_POST['editPlayerRules']))
        {
            $data = array(
                'title' => $_POST['title'],
                'description' => $_POST['description'],
            );
            $affected = DB::table(self::$table)
              ->where('id', $_POST['id'])
              ->update($data);

            return redirect(self::$view)->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        }
        else if(isset($_POST['deletePlayerRules']))
        {
            PlayerRules::where('id', $_POST['id'])
                ->delete();
            return redirect(self::$view)->with('message', 'ลบสำเร็จ')->with('status', 'success');
        }
        else if(isset($_POST['sort']))
        {
            $from = DB::table(self::$table)
            ->where('sort_order_id', $_POST['from'])
            ->first();

            $to = DB::table(self::$table)
            ->where('sort_order_id', $_POST['to'])
            ->first();
            
            if($to && $from)
            {
                $data_from = array('sort_order_id' => $_POST['to']);
                $data_to = array('sort_order_id' => $_POST['from']);

                $affected = DB::table(self::$table)
                  ->where('id', $from->id)
                  ->update($data_from);
                  
                $affected = DB::table(self::$table)
                  ->where('id', $to->id)
                  ->update($data_to);

                return redirect(self::$view)->with('message', 'แก้ไขลำดับสำเร็จ!')->with('status', 'success');
            }
        }
        return redirect(self::$view)->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function index()
    {
        $player_rules = DB::table(self::$table)->where('deleted_at', null)->orderBy('sort_order_id')->get();
        return view('backend.rule_huay.huay_rule', ['player_rules' => $player_rules]);
    }
}
