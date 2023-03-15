<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

class ReviewController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'review' => 'required',
            'rating' => 'required'
        ]);
        $data = array();
        $data['user_id'] = Auth::id();
        $data['tool_id'] = $request->tool_id;
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;
        $data['review_date'] = date('d-m-y');
        $data['review_month'] = date('F');
        $data['review_year'] = date('Y');

        DB::table('toolreviews')->insert($data);

        Toastr::success('Your review has been submitted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
