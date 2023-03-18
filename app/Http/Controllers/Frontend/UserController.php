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
        $orders = DB::table('orders')->where('user_id' , $user->id)->get();
        return view('frontend.profile.dashboard', compact('orders'));
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


    public function open_ticket(){
        $tickets = DB::table('tickets')->where('user_id', Auth::id())->take(10)->get();
        return view('frontend.profile.open_ticket', compact('tickets'));
    }

    public function create_ticket(){
        return view('frontend.profile.create_ticket');
    }


    public function store_ticket(Request $request){
        $data = array(
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'service' => $request->service,
            'priority' => $request->priority,
            'message' => $request->message,
        );
        $photo = $request->image;
        $photoname = uniqid().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(240, 120)->save('backend/files/tickets/'.$photoname);

        $data['image'] = 'backend/files/tickets/'.$photoname;

        DB::table('tickets')->insert($data);
        

        Toastr::success('Your ticket has been submitted', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }


    
    public function show_ticket($id){
        $ticket = DB::table('tickets')->where('id', $id)->first();
        $replies = DB::table('replies')->where('ticket_id', $ticket->id)->get();
        return view('frontend.profile.show_ticket', compact('ticket','replies'));
    }
}
