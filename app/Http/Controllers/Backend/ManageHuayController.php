<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HuayRounds;
use App\Models\Huays;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class ManageHuayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function huay_manage_post(Request $request)
    {
        if (isset($_POST['updateHuay'])) {
            $data = array(
                'price_tree_up' => $_POST['price_tree_up'],
                'price_tree_tod' => $_POST['price_tree_tod'],
                'price_tree_front' => $_POST['price_tree_front'],
                'price_tree_down' => $_POST['price_tree_down'],
                'price_two_up' => $_POST['price_two_up'],
                'price_two_down' => $_POST['price_two_down'],
                'price_run_up' => $_POST['price_run_up'],
                'price_run_down' => $_POST['price_run_down'],
            );
            DB::table('huays')
                ->where('id', $request->id)
                ->update($data);

            $huays = DB::table('huays')->where('id', $request->id)->first();
            return redirect('admin/manage_huay?category_id='.$huays->huay_category_id)->with('message', 'ทำรายการสำเร็จแล้ว!')->with('status', 'success');
        }
        return redirect('admin/manage_huay')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }


    public function index()
    {
        $_GET['category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : null;

        if ($_GET['category_id']) {
            $huays = DB::table('huays')
                ->join('huay_categorys', 'huays.huay_category_id', '=', 'huay_categorys.id')
                ->select('huays.*', 'huay_categorys.name as category_name')
                ->where('huay_category_id', $_GET['category_id'])
                ->get();
        } else {
            $huays = DB::table('huays')
                ->join('huay_categorys', 'huays.huay_category_id', '=', 'huay_categorys.id')
                ->select('huays.*', 'huay_categorys.name as category_name')
                ->get();
        }

        $huay_categorys = DB::table('huay_categorys')
            ->get();

        return view('backend.manage_huay.huay.huay_manage', ['huays' => $huays, 'huay_categorys' => $huay_categorys]);
    }

    public function manage_huay_yeekee()
    {
        return view('backend.manage_huay.huay_yeekee.huay_yeekee');
    }

    public function manage_huay_round_post(Request $request)
    {
        $_GET['category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $_GET['date'] = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

        if (isset($_POST['generate'])) {
            $check_duplicate = HuayRounds::where('date', $_POST['date'])->get();
            if (count($check_duplicate) == 0) {
                $huays = Huays::get();
                foreach ($huays as $huay) {
                    if ($huay->id > 1 && $huay->id < 9) {
                        if ($huay->id == 3 or $huay->id == 5 or $huay->id == 7) {
                            $_POST['start_datetime'] = $_POST['date'] . ' 00:00:00';
                            $_POST['end_datetime'] = $_POST['date'] . ' 11:59:59';
                        } else if ($huay->id == 4 or $huay->id == 6 or $huay->id == 8) {
                            $_POST['start_datetime'] = $_POST['date'] . ' 12:00:00';
                            $_POST['end_datetime'] = $_POST['date'] . ' 23:59:59';
                        }

                        $huay_round = new HuayRounds();
                        $huay_round->huay_category_id = $huay->huay_category_id;
                        $huay_round->can_shoot = $huay->can_shoot;
                        $huay_round->huay_id = $huay['id'];
                        $huay_round->name = $huay->name;
                        $huay_round->date = $_POST['date'];
                        $huay_round->start_time = date('H:i:s', strtotime($_POST['start_datetime']));
                        $huay_round->end_time = date('H:i:s', strtotime($_POST['end_datetime']));
                        $huay_round->start_datetime = $_POST['start_datetime'];
                        $huay_round->end_datetime = $_POST['end_datetime'];
                        $huay_round->price_tree_up = $huay->price_tree_up;
                        $huay_round->price_tree_tod = $huay->price_tree_tod;
                        $huay_round->price_tree_front = $huay->price_tree_front;
                        $huay_round->price_tree_down = $huay->price_tree_down;
                        $huay_round->price_two_up = $huay->price_two_up;
                        $huay_round->price_two_down = $huay->price_two_down;
                        $huay_round->price_run_up = $huay->price_run_up;
                        $huay_round->price_run_down = $huay->price_run_down;
                        $huay_round->is_active = 1;
                        $huay_round->round_status = 'pending';
                        $huay_round->save();

                        $data = array('secret' => md5(date('Y-m-d H:i:s') . '_huay_round_' . $huay_round->id));
                        DB::table('huay_rounds')
                            ->where('id', $huay_round->id)
                            ->update($data);

                    } else if ($huay->id > 20) {
                        for ($i = 1; $i < 88; $i++) {

                            $_POST['start_datetime'] = $_POST['date'] . ' 06:00:00';
                            $_POST['end_datetime'] = date('Y-m-d H:i:s', strtotime($_POST['start_datetime'] . ' + ' . ($i * 15) . ' minutes'));
                            $huay_round = new HuayRounds();
                            $huay_round->huay_category_id = $huay->huay_category_id;
                            $huay_round->can_shoot = $huay->can_shoot;
                            $huay_round->huay_id = $huay['id'];
                            $huay_round->name = $huay->name . ' รอบ ' . ($i );
                            $huay_round->date = $_POST['date'];
                            $huay_round->start_time = date('H:i:s', strtotime($_POST['start_datetime']));
                            $huay_round->end_time = date('H:i:s', strtotime($_POST['end_datetime']));
                            $huay_round->start_datetime = $_POST['start_datetime'];
                            $huay_round->end_datetime = $_POST['end_datetime'];
                            $huay_round->price_tree_up = $huay->price_tree_up;
                            $huay_round->price_tree_tod = $huay->price_tree_tod;
                            $huay_round->price_tree_front = $huay->price_tree_front;
                            $huay_round->price_tree_down = $huay->price_tree_down;
                            $huay_round->price_two_up = $huay->price_two_up;
                            $huay_round->price_two_down = $huay->price_two_down;
                            $huay_round->price_run_up = $huay->price_run_up;
                            $huay_round->price_run_down = $huay->price_run_down;
                            $huay_round->is_active = 1;
                            $huay_round->round_status = 'pending';
                            $huay_round->save();

                            $data = array('secret' => md5(date('Y-m-d H:i:s') . '_huay_round_' . $huay_round->id));
                            DB::table('huay_rounds')
                                ->where('id', $huay_round->id)
                                ->update($data);
                        }
                    } else {
                        $_POST['start_datetime'] = $_POST['date'] . ' 00:00:00';
                        $_POST['end_datetime'] = $_POST['date'] . ' 23:59:59';
                        $huay_round = new HuayRounds();
                        $huay_round->huay_category_id = $huay->huay_category_id;
                        $huay_round->can_shoot = $huay->can_shoot;
                        $huay_round->huay_id = $huay['id'];
                        $huay_round->name = $huay->name;
                        $huay_round->date = $_POST['date'];
                        $huay_round->start_time = date('H:i:s', strtotime($_POST['start_datetime']));
                        $huay_round->end_time = date('H:i:s', strtotime($_POST['end_datetime']));
                        $huay_round->start_datetime = $_POST['start_datetime'];
                        $huay_round->end_datetime = $_POST['end_datetime'];
                        $huay_round->price_tree_up = $huay->price_tree_up;
                        $huay_round->price_tree_tod = $huay->price_tree_tod;
                        $huay_round->price_tree_front = $huay->price_tree_front;
                        $huay_round->price_tree_down = $huay->price_tree_down;
                        $huay_round->price_two_up = $huay->price_two_up;
                        $huay_round->price_two_down = $huay->price_two_down;
                        $huay_round->price_run_up = $huay->price_run_up;
                        $huay_round->price_run_down = $huay->price_run_down;
                        $huay_round->is_active = 1;
                        $huay_round->round_status = 'pending';
                        $huay_round->save();

                        $data = array('secret' => md5(date('Y-m-d H:i:s') . '_huay_round_' . $huay_round->id));
                        DB::table('huay_rounds')
                            ->where('id', $huay_round->id)
                            ->update($data);
                    }
                }
            }
            return redirect('admin/manage_huay_round?category_id=' . $_GET['category_id'] . '&date=' . $_GET['date'])->with('message', 'generate สำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['updateRound'])) {

            $_POST['start_datetime'] = $_POST['date'] . ' ' . date('H:i:00', strtotime($_POST['start_time']));
            $_POST['end_datetime'] = $_POST['date'] . ' ' . date('H:i:59', strtotime($_POST['end_time']));

            $huay = DB::table("huays")->where('id', $_POST['huay_id'])->first();
            if (!$huay)
                return redirect('admin/manage_huay_round')->with('message', 'ไม่พบหวยที่ท่านเลือก!')->with('status', 'error');
            if (date('Y-m-d H:i:s', strtotime($_POST['start_datetime'])) > date('Y-m-d H:i:s', strtotime($_POST['end_datetime'])))
                return redirect('admin/manage_huay_round')->with('message', 'ไม่สามารถเลือกวันเวลาเริ่มต้น หลังจากวันเวลาสิ้นสุดได้!')->with('status', 'error');

            $data = array(
                'huay_category_id' => $huay->huay_category_id,
                'can_shoot' => $huay->can_shoot,
                'huay_id' => $_POST['huay_id'],
                'name' => $_POST['name'],
                'date' => $_POST['date'],
                'start_time' => $_POST['start_time'],
                'end_time' => $_POST['end_time'],
                'start_datetime' => $_POST['start_datetime'],
                'end_datetime' => $_POST['end_datetime'],
                'price_tree_up' => $_POST['price_tree_up'],
                'price_tree_tod' => $_POST['price_tree_tod'],
                'price_tree_front' => $_POST['price_tree_front'],
                'price_tree_down' => $_POST['price_tree_down'],
                'price_two_up' => $_POST['price_two_up'],
                'price_two_down' => $_POST['price_two_down'],
                'price_run_up' => $_POST['price_run_up'],
                'price_run_down' => $_POST['price_run_down'],
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);
            return redirect('admin/manage_huay_round?category_id=' . $_GET['category_id'] . '&date=' . $_GET['date'])->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['deleteRound'])) {

            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->delete();
            return redirect('admin/manage_huay_round?category_id=' . $_GET['category_id'] . '&date=' . $_GET['date'])->with('message', 'ลบสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['on'])) {
            $data = array(
                'is_active' => 1,
                'round_status' => 'pending',
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);

            return redirect('admin/manage_huay_round?category_id=' . $_GET['category_id'] . '&date=' . $_GET['date'])->with('message', 'เปิดสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['off'])) {
            $data = array(
                'is_active' => 0,
                'round_status' => 'close',
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);
            return redirect('admin/manage_huay_round?category_id=' . $_GET['category_id'] . '&date=' . $_GET['date'])->with('message', 'ปิดสำเร็จ!')->with('status', 'success');
        }
        return redirect('admin/manage_huay_round')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function manage_huay_round()
    {
        $_GET['category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $_GET['date'] = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

        $huays = DB::table('huays')
            ->join('huay_categorys', 'huays.huay_category_id', '=', 'huay_categorys.id')
            ->select('huays.*', 'huay_categorys.name as category_name')
            ->get();

        $huay_categorys = DB::table('huay_categorys')
            ->get();

        $query = HuayRounds::query();

        $query = $query->whereBetween('start_datetime', array($_GET['date'] . ' 00:00:00', $_GET['date'] . ' 23:59:59'));

        if ($_GET['category_id'])
            $query = $query->where('huay_category_id', $_GET['category_id']);

        $query = $query->join('huay_categorys', 'huay_rounds.huay_category_id', '=', 'huay_categorys.id');
        $query = $query->select('huay_rounds.*', 'huay_categorys.name as category_name');
        $huay_rounds = $query->get();

        $data = array(
            'huay_rounds' => $huay_rounds,
            'huays' => $huays,
            'huay_categorys' => $huay_categorys
        );
        return view('backend.manage_huay.huay_round.huay_round', $data);
    }

    public function manage_huay_yeekee_cf()
    {
        return view('backend.manage_huay.huay_yeekee_cf.huay_yeekee_cf');
    }
}
