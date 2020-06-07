<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactHeader;
use Illuminate\Http\Request;
use App\Models\Contacts;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class ContactHuayController extends Controller
{
    private static $table = "contacts";
    private static $view = "admin/contact_huay";

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($_POST['addContacts'])) {

            $contact = new Contacts();
            $contact->description = $request->description;

           
            $contact->save();

            $path = '';
            if ($request->hasFile('image')) {
                $filepath = 'uploads/contacts/' . $contact->id;
                if (!File::exists($filepath)) {
                    File::makeDirectory($filepath, 0775, true);
                }

                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $filename = 'image_' . $contact->id . '.' . $ext;
                $file->move($filepath, $filename);

                $path = $filepath.'/'.$filename;
            }

            $sort_data = array(
                'sort_order_id' => $contact->id,
                'image' => $path
            );

            DB::table(self::$table)
                ->where('id', $contact->id)
                ->update($sort_data);
            return redirect(self::$view)->with('message', 'เพิ่มข้อมูลสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['editContacts'])) {

            $data = array('description' => $request->description);
            if ($request->hasFile('image')) {
                $filepath = 'uploads/contacts/' . $request->id;
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
        } else if (isset($_POST['deleteContacts'])) {
            Contacts::where('id', $_POST['id'])
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
        }else if(isset($_POST['updateContactHeader']))
        {
            $data = array(
                'tel' => $_POST['tel'],
                'email' => $_POST['email'],
            );
            ContactHeader::where('id', $_POST['id'])->update($data);
            return redirect(self::$view)->with('message', 'แก้ไขลำดับสำเร็จ!')->with('status', 'success');
        }
        return redirect(self::$view)->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function index()
    {
        $contact_header = ContactHeader::first();
        $contacts = DB::table(self::$table)->where('deleted_at', null)->orderBy('sort_order_id')->get();
        return view('backend.contact_huay.huay_contact', ['contacts' => $contacts, 'contact_header' => $contact_header]);
    }
}
