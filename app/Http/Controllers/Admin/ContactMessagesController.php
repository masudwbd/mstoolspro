<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactMessagesController extends Controller
{
    public function index(){
        $data = DB::table('contact_messages')->orderBy('date' , 'DESC')->get();
        return view('admin.contact_messages.index' , compact('data'));
    }
}
