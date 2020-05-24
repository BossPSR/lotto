<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contacts::where('deleted_at', null)->OrderBy('sort_order_id')->get();
        return view('frontend.contact', ['contacts' => $contacts]);
    }
}
