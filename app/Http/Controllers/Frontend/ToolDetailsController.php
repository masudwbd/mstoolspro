<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ToolDetailsController extends Controller
{
    public function index($id){
        $data = DB::table('freetools')->where('id', $id)->first();
        return view('frontend.tool_details',compact('data'));
    }
}
