<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.index_admin');
    }

    public function post_admin(Request $request)
    {
        if (isset($_POST['addAdmins'])) {

            $admin = new Admin();
            $admin->username = $_POST['username'];
            $admin->email = $_POST['email'];
            $admin->status = $_POST['status'];
            $admin->password = Hash::make($_POST['password']);

            $check_username = DB::table('admins')->where('username', $_POST['username'])->where('deleted_at', null)->first();

            if ($check_username)
                return redirect('admin/manage_admin')->with('message', 'เพิ่มไม่สำเร็จคุณไม่สามารถใช้ Username ซ้ำกันได้!')->with('status', 'error');

            $check_email = DB::table('admins')->where('email', $_POST['email'])->where('deleted_at', null)->first();
            if ($check_email)
                return redirect('admin/manage_admin')->with('message', 'เพิ่มไม่สำเร็จคุณไม่สามารถใช้ Email ซ้ำกันได้!')->with('status', 'error');

            // Save the model
            $admin->save();

            return redirect('admin/manage_admin')->with('message', 'เพิ่มข้อมูลสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['editAdmins'])) {
            $data = array(
                'status' => $_POST['status'],
                'email' => $_POST['email'],
            );
            if ($_POST['new_password'])
                $data['password'] = Hash::make($_POST['new_password']);

            if ($_POST['email']) {
                $check_email = DB::table('admins')->where('email', $_POST['email'])->whereNotIn('id', [$_POST['id']])->where('deleted_at', null)->first();
                if ($check_email)
                    return redirect('admin/manage_admin')->with('message', 'เพิ่มไม่สำเร็จคุณไม่สามารถใช้ Email ซ้ำกันได้!')->with('status', 'error');
            }
            $affected = DB::table('admins')
                ->where('id', $_POST['id'])
                ->update($data);

            return redirect('admin/manage_admin')->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['deleteAdmins'])) {

            $old = DB::table('admins')
            ->where('id', $_POST['id'])
            ->first();

            $data = array(
                "username" => $old->username.'_delete',
                "email" => $old->email.'_delete',
            );
            $affected = DB::table('admins')
            ->where('id', $_POST['id'])
            ->update($data);

            Admin::where('id', $_POST['id'])
                ->delete();
            return redirect('admin/manage_admin')->with('message', 'ลบสำเร็จ')->with('status', 'success');
        }
        return redirect('admin/manage_admin')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function manage_admin()
    {
        $admins = DB::table('admins')->where('deleted_at', null)->orderBy("status", 'desc')->get();

        return view('backend.manage_admin', ['admins' => $admins]);
    }
}
