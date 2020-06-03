<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public function getFingerprint(Request $request)
    {
        $result =  $request->fingerprint();
        return response()->json($result, 200);
    }
}
