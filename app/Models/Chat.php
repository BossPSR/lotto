<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    use SoftDeletes;

    protected $table = "chat";
    protected $dates = ['deleted_at'];

    function __construct()
    {
        $chats = DB::table($this->table)->where('created_at', '<', date('Y-m-d H:i:s', strtotime("-15 days")))->get();
        if (count($chats)) {
            $id_all = array();
            foreach ($chats as $info)
            {
                File::delete($info->image);
                array_push($id_all, $info->id);
            }

            DB::table($this->table)
                ->where('id', $id_all)
                ->delete();
        }
    }

}
