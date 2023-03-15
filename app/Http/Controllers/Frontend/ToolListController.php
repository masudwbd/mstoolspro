<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ToolListController extends Controller
{
    public function alltools(){
        $tools = DB::table('freetools')->get();
        return view('frontend.tool_list' , compact('tools'));
    }
    public function freetools(){
        $tools = DB::table('freetools')->where('type', 'free')->get();
        return view('frontend.tool_list' , compact('tools'));
    }
    public function paidtools(){
        $tools = DB::table('freetools')->where('type', 'paid')->get();
        return view('frontend.tool_list' , compact('tools'));
    }
    public function categorytools($id){
        $tools = DB::table('freetools')->where('category_id', $id)->get();
        return view('frontend.tool_list' , compact('tools'));
    }
}
