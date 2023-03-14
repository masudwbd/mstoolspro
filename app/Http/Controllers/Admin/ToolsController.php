<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreeTool;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use File;
use Str;
use Image;

class ToolsController extends Controller
{
    public function index(){
        $data = DB::table('freetools')->get();
        return view('admin.tools.index', compact('data'));
    }

    public function add(){
        return view('admin.tools.add');
    }
    public function store(Request $request){
        $data = array(
            'category_id' => $request->category_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'description' => $request->description,
            'video' => $request->video,
            'thumbnail' => 'check'
        );

        $file = $request->file('tool');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);
        $data['tool'] = 'backend/tools/'. $filename;

        $slug = Str::slug($request->title . '.');
        $photoname = $slug.'.'.$request->thumbnail->getClientOriginalExtension();
        Image::make($request->thumbnail)->save('backend/files/thumbnails/'.$photoname);

        $data['thumbnail'] = 'backend/files/thumbnails/'.$photoname;

        DB::table('freetools')->insert($data);
        Toastr::success('Tool Inserted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function edit($id){
        $data = DB::table('freetools')->where('id', $id)->first();
        return view('admin.tools.edit' , compact('data'));
    }

    public function update(Request $request){
        $data = array(
            'category_id' => $request->category_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'description' => $request->description,
            'video' => $request->video,
            'thumbnail' => 'check'
        );

        $slug = Str::slug($request->title . '.');

        if($request->thumbnail){
            if(File::exists($request->old_thumbail)){
                unlink($request->old_thumbail);
            }
            $photoname = $slug.'.'.$request->thumbnail->getClientOriginalExtension();
            Image::make($request->thumbnail)->save('backend/files/thumbnails/'.$photoname);
            $data['thumbnail'] = 'backend/files/thumbnails/'.$photoname;
        }else{
           $data['thumbnail'] = $request->old_thumbnail;
        }

        $data['tool'] = $request->old_tool;


        DB::table('freetools')->where('id', $request->id)->update($data);
        Toastr::success('Tool Updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
        
    }

    public function delete($id){
        DB::table('freetools')->where('id', $id)->delete();
        Toastr::error('Tool Deleted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
