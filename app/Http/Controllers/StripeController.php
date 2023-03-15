<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StripeController extends Controller
{
    public function payment(Request $request, $id){

        $tool = DB::table('freetools')->where('id', $id)->first();

        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET_KEY"));

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $tool->title,
            ],
            'unit_amount' => $tool->price * 10,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('payment.success'),
        'cancel_url' => route('payment.cancel'),
        ]);
        return redirect()->away($checkout_session->url);
    }
    public function success(){
        
    }
    public function cancel(){
        
    }
}
