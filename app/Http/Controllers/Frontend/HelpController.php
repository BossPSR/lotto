<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PlayerRules;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $player_rules = PlayerRules::where("deleted_at", null)->OrderBy('sort_order_id')->get();
        return view('frontend.help', [ 'player_rules' => $player_rules]);
    }
}
