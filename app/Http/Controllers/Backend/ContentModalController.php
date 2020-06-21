<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContentModals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
class ContentModalController extends Controller
{
    private static $table = "content_modals";
    private static $view = "admin/content_modal_huay";

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($_POST['addcontent_modals'])) {

            $content_modal = new ContentModals();
            $content_modal->description = $request->description;

           
            $content_modal->save();

            $path = '';
            if ($request->hasFile('image')) {
                $filepath = 'uploads/content_modals/' . $content_modal->id;
                if (!File::exists($filepath)) {
                    File::makeDirectory($filepath, 0775, true);
                }

                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $filename = 'image_' . $content_modal->id . '.' . $ext;
                $file->move($filepath, $filename);

                $path = $filepath.'/'.$filename;
            }

            $sort_data = array(
                'sort_order_id' => $content_modal->id,
                'image' => $path
            );

            DB::table(self::$table)
                ->where('id', $content_modal->id)
                ->update($sort_data);
            return redirect(self::$view)->with('message', 'เพิ่มข้อมูลสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['editcontent_modals'])) {

            $data = array('description' => $request->description);
            if ($request->hasFile('image')) {
                $filepath = 'uploads/content_modals/' . $request->id;
                if (!File::exists($filepath)) {
                    File::makeDirectory($filepath, 0775, true);
                }

                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $filename = 'image_' . $request->id . '.' . $ext;
                $file->move($filepath, $filename);

                $data['image'] = $filepath . '/' . $filename;
                
            }

            $affected = DB::table(self::$table)
                    ->where('id', $_POST['id'])
                    ->update($data);

            return redirect(self::$view)->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['deletecontent_modals'])) {
            ContentModals::where('id', $_POST['id'])
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
        return redirect(self::$view)->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
        }
    }

    public function index()
    {
        $content_modals = DB::table(self::$table)->where('deleted_at', null)->orderBy('id', 'desc')->get();
        return view('backend.content_modal_huay.huay_content_modal', ['content_modals' => $content_modals]);
    }
}
