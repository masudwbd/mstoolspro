<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ToolListController extends Controller
{
    public function freetools(){
        $tools = DB::table('freetools')->get();
        return view('frontend.tool_list' , compact('tools'));
    }
}
