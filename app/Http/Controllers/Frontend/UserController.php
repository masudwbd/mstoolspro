<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use Str;
use Image;
use File;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function index(){
        $user = DB::table("users")->where('id', Auth::user()->id)->first();
        return view('frontend.profile.dashboard');
    }

    public function store_picture(Request $request){
        $user = User::findorfail(Auth::id());
        $slug = Str::slug($user->name,'-');
        $photo = $request->profile_picture;
        $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->save('backend/files/profile_pictures/'.$photoname);
        $image = 'backend/files/profile_pictures/' . $photoname;
        $user->image = $image;
        $user->save();
        Toastr::success('Profile Picture updated!', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function update_picture(Request $request){
        $user = User::findorfail(Auth::id());
        $slug = Str::slug($user->name, '-');
        if ($request->profile_picture) {
            if(File::exists($request->old_profile_picture)){
                unlink($request->old_profile_picture);
            }
            $photo = $request->profile_picture;
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save('backend/files/profile_pictures/' . $photoname);
            $image = 'backend/files/profile_pictures/' . $photoname;
            $user->image = $image;
            $user->save();

            Toastr::success('Profile Picture updated!', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } else {
            $user->image = $request->old_profile_picture;
            $user->save();

            Toastr::success('Profile Picture updated!', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


}
