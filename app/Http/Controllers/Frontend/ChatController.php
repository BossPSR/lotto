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
        $result = isset(Auth::user()->id) ? Auth::user()->id : 0;
        return response()->json($result, 200);
    }

    public function get_chat_list(Request $request)
    {
        $result =  Chat::where('fingerprint', $request->fingerprint)->get();
        $id_all = array();
        if ($result) {
            foreach ($result as $index => $data) {
                array_push($id_all, $data->id);
                if ($data->image)
                    $result[$index]->image = asset($data->image);
            }

            Chat::whereIn('id', $id_all)->update(['is_' . $request->position . '_read' => 1]);
        }

        return response()->json($result, 200);
    }

    public function add_chat_list(Request $request)
    {
        $new_chat = new Chat();
        $new_chat->fingerprint = $request->fingerprint;
        $new_chat->text = $request->text;
        if (isset($request->is_admin))
            $new_chat->is_admin = 1;

        if ($request->hasFile('image')) {
            $filepath = 'uploads/chat/';
            if (!File::exists($filepath)) {
                File::makeDirectory($filepath, 0777, true);
            }

            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            $filename = time() . '_chat' . $request->fingerprint . '.' . $ext;
            $file->move($filepath, $filename);

            $new_chat->image = $filepath . '/' . $filename;
        }
        $new_chat->save();
        return response()->json($new_chat, 200);
    }
}
