<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->search;
    
        $tools = DB::table('freetools')
                        ->where('slug', 'LIKE', "%$query%")
                        ->orWhere('subtitle', 'LIKE', "%$query%")
                        ->get();
        return view('frontend.tool_list', compact('tools'));
    }
}
