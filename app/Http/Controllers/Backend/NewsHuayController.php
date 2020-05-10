<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contents;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class NewsHuayController extends Controller
{   
    private static $table = "";
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post()
    {
        
        if(isset($_POST['addContents']))
        {

            $content = new Contents;
            $content->title = $_POST['title'];
            $content->description = $_POST['description'];

             // Save the model
             $content->save();
        
            $sort_data = array('sort_order_id' => $content->id);
           
            DB::table('contents')
            ->where('id', $content->id)
            ->update($sort_data);
            
            return redirect('admin/news_huay')->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        }
        else if(isset($_POST['editContents']))
        {
            $data = array(
                'title' => $_POST['title'],
                'description' => $_POST['description'],
            );
            $affected = DB::table('contents')
              ->where('id', $_POST['id'])
              ->update($data);

            return redirect('admin/news_huay')->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        }
        else if(isset($_POST['deleteContents']))
        {
            Contents::where('id', $_POST['id'])
                ->delete();
            return redirect('admin/news_huay')->with('message', 'ลบสำเร็จ')->with('status', 'success');
        }
        else if(isset($_POST['sort']))
        {
            $from = DB::table('contents')
            ->where('sort_order_id', $_POST['from'])
            ->first();

            $to = DB::table('contents')
            ->where('sort_order_id', $_POST['to'])
            ->first();
            
            if($to && $from)
            {
                $data_from = array('sort_order_id' => $_POST['to']);
                $data_to = array('sort_order_id' => $_POST['from']);

                $affected = DB::table('contents')
                  ->where('id', $from->id)
                  ->update($data_from);
                  
                $affected = DB::table('contents')
                  ->where('id', $to->id)
                  ->update($data_to);

                return redirect('admin/news_huay')->with('message', 'แก้ไขลำดับสำเร็จ!')->with('status', 'success');
            }
        }
        return redirect('admin/news_huay')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function index()
    {
        $contents = DB::table('contents')->where('deleted_at', null)->orderBy('sort_order_id')->get();
        return view('backend.news_huay.huay_news', ['contents' => $contents]);
    }
}
