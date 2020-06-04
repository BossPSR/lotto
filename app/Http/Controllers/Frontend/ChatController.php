<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function get_fingerprint(Request $request)
    {
        $result =  $request->fingerprint();
        return response()->json($result, 200);
    }
    
    public function get_chat_list(Request $request)
    {
        $result =  Chat::where('fingerprint', $request->fingerprint)->get();
        $id_all = array();
        if($result)
        {
            foreach($result as $data)
                array_push($id_all, $data->id);

                Chat::whereIn('id', $id_all)->update(['is_'.$request->position.'_read'=> 1]);
        }

        return response()->json($result, 200);
    }

    public function add_chat_list(Request $request)
    {
        $new_chat = new Chat();
        $new_chat->fingerprint = $request->fingerprint;
        $new_chat->text = $request->text;
        if(isset($request->is_admin))
            $new_chat->is_admin = 1;
        $new_chat->save();
        return response()->json($new_chat, 200);
    }
}
