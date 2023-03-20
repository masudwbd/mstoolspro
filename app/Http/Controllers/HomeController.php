<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = DB::table('blogs')->orderBy('date', 'DESC')->take('2')->get();
        return view('frontend.home', compact('blogs'));
    }


    public function admin(){
        return view('admin.home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


    public function blogs(){
        $blogs = DB::table('blogs')->orderBy('date', 'DESC')->get();
        return view('frontend.blogs.index', compact('blogs'));
    }
    public function about_us(){
        return view('frontend.aboutus');
    }
    public function contact_us(){
        return view('frontend.contactus');
    }
    
    public function contact_message_store(Request $request){
        $data = array(
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'date' => date('d.m.y')
        );
        DB::table('contact_messages')->insert($data);
        Session::flash('success', 'Your form has been submitted successfully! We will contact you as soon as possible. Thank you.');
        return redirect()->back();
    }
}
