<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use DB;
use Image;
use File;
use Brian2694\Toastr\Facades\Toastr;
class BlogController extends Controller
{
    public function index(){
        $data = DB::table('blogs')->orderBy('date')->get();
        return view('admin.blogs.index', compact('data'));
    }
    public function add(){
        return view('admin.blogs.add');
    }
    public function store(Request $request){
        $data = array(
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => date("F j, Y, g:i a")  ,
        );

        $slug = Str::slug($request->title . '.');
        $photoname = $slug.'.'.$request->thumbnail->getClientOriginalExtension();
        Image::make($request->thumbnail)->save('backend/files/thumbnails/'.$photoname);
        $data['thumbnail'] = 'backend/files/thumbnails/'.$photoname;

        DB::table('blogs')->insert($data);
        Toastr::success('Tool Inserted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function edit($id){
        $blog = DB::table('blogs')->where('id', $id)->first();
        return view('admin.blogs.edit', compact('blog'));
    }
    public function update(Request $request){
        $data = array(
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => date("F j, Y, g:i a")  ,
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

        DB::table('blogs')->where('id', $request->id)->update($data);

        Toastr::success('Blog Updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    public function delete($id){
        DB::table('blogs')->where('id' , $id)->delete();
        Toastr::error('Blog Deleted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
