<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Banks;
use App\Models\Chat;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class chatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $chats = DB::table('chat')
            ->join('users', 'users.id', '=', 'chat.fingerprint')
            ->select('users.username', 'chat.*')
            ->get();

        // $chats = Chat::get();
        $chat_list = array();
        if ($chats) {
            foreach ($chats as $value) {
                if (!isset($chat_list[$value->fingerprint]))
                    $chat_list[$value->fingerprint] = array('count' => 0, 'username' => $value->username);
                if ($value->is_admin_read == 0)
                    $chat_list[$value->fingerprint]['count']++;
            }
        }
        return view('backend.chat.chat', ['chat_list' => $chat_list]);
    }
}
