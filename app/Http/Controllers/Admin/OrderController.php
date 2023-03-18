<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')->where('status' , 'paid')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function delivered(Request $request){
        $order = Order::findorfail($request->id);
        $order->delivered = 'delivered';
        $order->save();
        Toastr::success('Status updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function not_delivered(Request $request){
        $order = Order::findorfail($request->id);
        $order->delivered = null;
        $order->save();
        Toastr::success('Status updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
