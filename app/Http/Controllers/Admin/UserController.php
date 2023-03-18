<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')->where('is_admin' , '0')->get();
        return view('admin.users.index', compact('users'));
    }
}
