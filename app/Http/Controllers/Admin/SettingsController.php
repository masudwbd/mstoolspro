<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Brian2694\Toastr\Facades\Toastr;
use Image;
class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $settings = DB::table('settings')->first();
        return view('admin.settings' , compact('settings'));
    }   

    public function update(Request $request, $id){
       $data = array(
        'currency' => $request->currency,
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'main_email' => $request->main_email,
        'support_email' => $request->support_email,
        'address' => $request->address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'youtube' => $request->youtube
       );

       if($request->logo){
        if(File::exists($request->old_logo)){
            unlink($request->old_logo);
        };
        $photo=$request->logo;
        $photoname = uniqid().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('backend/files/logo/'.$photoname);
        $data['logo'] = 'backend/files/logo/'.$photoname;
        }else{
            $data['logo'] = $request->old_logo;
        }

        DB::table('settings')->where('id', $id)->update($data);
        Toastr::success('Settings updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
