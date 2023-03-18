<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
class ChatController extends Controller
{
    public function store(Request $request){
        $data = array(
            'user_id' => Auth::user()->id,
            'message' => $request->message
        );

        DB::table('chats')->insert($data);
        return redirect()->back();
    }
}
