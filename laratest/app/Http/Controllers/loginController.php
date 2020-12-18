<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\user;

class loginController extends Controller
{
   public function index(Request $req){
       return view('login.index');
   }
   public function verifyy(Request $req){
       $users=user::all();

    //    print_r($users);
    if($req->username == $req->password){
        $req->session()->put('username', $req->username);
        $req->session()->put('type', $req->username);
        return redirect()->route('home.index');
    }else{
        $req->session()->flash('msg', 'invalid username/password');
        return redirect('/login');
        //return view('login.index');
    }
   }
}
