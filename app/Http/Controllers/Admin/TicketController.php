<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
class TicketController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $ticket = "";
            $query = DB::table('tickets')->leftJoin('users', 'tickets.user_id', 'users.id');
                if($request->date){
                    $query->where('tickets.date', $request->date);
                }
                if($request->service=='technical'){
                    $query->where('tickets.service', $request->service);
                }
                if($request->service=='setup'){
                    $query->where('tickets.service', $request->service);
                }
                if($request->service=='others'){
                    $query->where('tickets.service', $request->service);
                }
            $ticket = $query->select('tickets.*','users.name')->get();
            return DataTables::of($ticket)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $actionbtn = '
                    <a href="'.route('admin.ticket.show', [$row->id]).'" class="btn btn-warning"> <i class="fas fa-eye"></i>
                    </a>
                    <a href="'.route('admin.ticket.delete', [$row->id]).'" class="btn btn-danger" id="delete_ticket"> <i class="fas fa-trash"></i>
                    </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.ticket.index');
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
            'date' => date('Y-m-d')
        );

        DB::table('replies')->insert($data);
        return redirect()->back();
    }

    public function destroy($id){
        DB::table('tickets')->where('id' , $id)->delete();
        return redirect()->back();
    }
}
