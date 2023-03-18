<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Cartalyst\Stripe\Stripe;
use Auth;
use Illuminate\Support\Str;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class StripeController extends Controller
{
    public function payment(Request $request, $id){

        $tool = DB::table('freetools')->where('id', $id)->first();

        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $tool->title,
            ],
            'unit_amount' => $tool->price * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('payment.success', true)."?session_id={CHECKOUT_SESSION_ID}",
        'cancel_url' => route('payment.cancel'),
        ]);
        $order = array(
            'user_id' => Auth::user()->id,
            'tool_id' => $tool->id,
            'session_id' => $checkout_session->id,
            'tool_name' => $tool->title,
            'tool_price' => $tool->price,
            'date' => date("m.d.y"),
            'status' => 'unpaid',
            'order_id' => Str::random(12),
            'customer_email' => Auth::user()->email,
        );
        DB::table('orders')->insert($order);
        return redirect()->away($checkout_session->url);
    }
    public function success(Request $request){
        $sessionId = $request->session_id;
        $check = DB::table('orders')->where('session_id' , $sessionId)->first();
        if(!$check){
            throw new NotFoundHttpException;
        }else{
            if($check->status === 'unpaid'){
                $order = Order::findorfail($check->id);
                $order->status = 'paid';
                $order->save();
                return view('stripe.success');
            }else{
                return view('stripe.success');
            }
        }
    }
    public function cancel(){
        
    }
}
