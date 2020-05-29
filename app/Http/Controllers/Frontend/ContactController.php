<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index()
    {
        $this->middleware('auth');

        $contacts = Contacts::where('deleted_at', null)->OrderBy('sort_order_id')->get();
        return view('frontend.contact', ['contacts' => $contacts]);
    }


    public function index_visitor()
    {
        $contacts = Contacts::where('deleted_at', null)->OrderBy('sort_order_id')->get();
        return view('frontend.contact_visitor', ['contacts' => $contacts]);
    }
}
