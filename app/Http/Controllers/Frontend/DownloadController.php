<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DownloadController extends Controller
{
    public function download($id){
        $tool = DB::table('freetools')->where('id', $id)->first();
        $data = array(
            'tool_id' => $tool->id,
            'date' => date('d.m.y'),
        );
        DB::table('tooldownloads')->insert($data);
        $file = public_path($tool->tool);
        return response()->download($file);
    }
}
