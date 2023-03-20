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
use DataTables;

class ToolsController extends Controller
{
    // public function index(){
    //     $data = DB::table('freetools')->get();
    //     return view('admin.tools.index', compact('data'));
    // }
    public function index(Request $request){
        if($request->ajax()){
            $data = DB::table('freetools')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $actionbtn = '<a href="#" class="btn btn-info edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" id="edit"> <i class="fas fa-edit"></i> </a>
                    <a href="'.route('tools.delete', [$row->id]).'" class="btn btn-danger button" id="delete"> <i class="fas fa-trash" ></i>
                    </a>';

                    return $actionbtn;
                })
                -> rawColumns(['action'])
                ->make(true);
        }
        return view('admin.tools.index');
    }

    public function add(){
        return view('admin.tools.add');
    }
    public function store(Request $request){
        $data = array(
            'type' => $request->type,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' =>  Str::slug($request->title . '-'),
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'description' => $request->description,
            'video' => $request->video,
            'thumbnail' => 'check'
        );

        $file = $request->file('tool');
        // Get the public directory path
        $publicPath = public_path();
        // Get the original filename
        $filename = $file->getClientOriginalName();
        // Move the file to the public directory
        $file->move($publicPath . '/tools' , $filename);


        $data['tool'] = 'tools/'. $filename;

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
            'type' => $request->type,
            'slug' =>  Str::slug($request->title . '-'),
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
