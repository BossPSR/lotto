<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Banks;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class BankHuayController extends Controller
{

    private static $table = "banks";
    private static $view = "admin/bank_huay";

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($_POST['addBanks'])) {

            $bank = new Banks();
            $bank->bank_name = $_POST['bank_name'];
            $bank->account_no = $_POST['account_no'];
            $bank->account_name = $_POST['account_name'];

            // Save the model
            $bank->save();

            $sort_data = array('sort_order_id' => $bank->id);

            DB::table(self::$table)
                ->where('id', $bank->id)
                ->update($sort_data);

            return redirect(self::$view)->with('message', 'เพิ่มข้อมูลสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['editBanks'])) {
            $data = array(
                'bank_name' => $_POST['bank_name'],
                'account_no' => $_POST['account_no'],
                'account_name' => $_POST['account_name'],
            );
            $affected = DB::table(self::$table)
                ->where('id', $_POST['id'])
                ->update($data);

            return redirect(self::$view)->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['deleteBanks'])) {
            Banks::where('id', $_POST['id'])
                ->delete();
            return redirect(self::$view)->with('message', 'ลบสำเร็จ')->with('status', 'success');
        } else if (isset($_POST['sort'])) {
            $from = DB::table(self::$table)
                ->where('sort_order_id', $_POST['from'])
                ->first();

            $to = DB::table(self::$table)
                ->where('sort_order_id', $_POST['to'])
                ->first();

            if ($to && $from) {
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
        $banks = DB::table(self::$table)->where('deleted_at', null)->orderBy('sort_order_id')->get();
        return view('backend.bank_huay.huay_bank', ['banks' => $banks]);
    }
}
