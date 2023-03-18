<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
class TicketController extends Controller
{
    public function index(Request $request){
        $data = DB::table('tickets')->get();
        return view('admin.ticket.index' , compact('data'));
    }

    public function ticket_show($id){
        $data = DB::table('tickets')->where('id', $id)->first();
        $replies = DB::table('replies')->where('ticket_id' , $data->id)->get();
        return view('admin.ticket.show', compact('data', 'replies'));
    }

    public function ticket_reply(Request $request){
        $data = array(
            'ticket_id' => $request->ticket_id,
            'user_id' => $request->user_id,
            'message' => $request->message,
            'date' => date("m.d.y")
        );

        DB::table('replies')->insert($data);
        return redirect()->back();
    }
}
