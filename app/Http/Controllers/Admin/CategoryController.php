<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Toastr;


class CategoryController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = DB::table('categories')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $actionbtn = '<a href="#" class="btn btn-info edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" id="edit"> <i class="fas fa-edit"></i> </a>
                    <a href="'.route('categories.delete', [$row->id]).'" class="btn btn-danger" id="delete"> <i class="fas fa-trash" ></i>
                    </a>';

                    return $actionbtn;
                })
                -> rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categories.index');
    }

    public function add(Request $request){
        return view('admin.categories.add');
    }
    public function store(Request $request){
        $data = array(
            'name' => $request->name,
        );
        DB::table('categories')->insert($data);
        Toastr::success('Category Inserted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function edit($id){
        $data = DB::table('categories')->where('id' , $id)->first();
        return view('admin.categories.edit', compact('data'));
    }

    public function update(Request $request){
        $data = array(
            'name' => $request->name,
        );
        DB::table('categories')->where('id', $request->id)->update($data);
        Toastr::success('Category Updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id){
        DB::table('categories')->where('id' , $id)->delete();
        Toastr::error('Category Deleted!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
