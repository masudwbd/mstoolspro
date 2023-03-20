<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use DataTables;

class OrderController extends Controller
{
    public function index(Request $request){
        // $orders = DB::table('orders')->where('status' , 'paid')->get();
        // return view('admin.orders.index', compact('orders'));
        if ($request->ajax()) {
            $ticket = "";
            $query = DB::table('orders')->leftJoin('users', 'orders.user_id', 'users.id');
                if($request->date){
                    $query->where('orders.date', $request->date);
                }
            $orders = $query->select('orders.*','users.name')->get();
            return DataTables::of($orders)
                ->addIndexColumn()
                ->editColumn('delivered', function ($row) {
                    if($row->delivered== null){
                        return '<span class="badge badge-info"> Pending </span>';
                    }elseif($row->delivered== 'delivered'){
                        return '<span class="badge badge-success"> Delivered </span>';
                    }
                })
                ->addColumn('action', function($row) {
                    $actionbtn = '
                    <a href="'.route('order.delivered', [$row->id]).'" class="btn btn-warning"> <i class="fa-solid fa-truck"></i>
                    </a>
                    <a href="'.route('order.not.delivered', [$row->id]).'" class="btn btn-danger" id="delete_ticket"><i class="fa-solid fa-rss"></i>
                    </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action' , 'delivered'])
                ->make(true);
        }
        return view('admin.orders.index' );
    }

    public function delivered($id){
        $order = Order::findorfail($id);
        $order->delivered = 'delivered';
        $order->save();
        Toastr::success('Status updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function not_delivered($id){
        $order = Order::findorfail($id);
        $order->delivered = null;
        $order->save();
        Toastr::success('Status updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
