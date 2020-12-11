<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class loginController extends Controller
{
   public function index(Request $req){
       return view('login.index');
   }
   public function verifyy(Request $req){
    if($req->username == $req->password){
        $req->session()->put('username', $req->username);
        $req->session()->put('type', $req->username);
        return redirect('/home');
    }else{
        $req->session()->flash('msg', 'invalid username/password');
        return redirect('/login');
        //return view('login.index');
    }
   }
}
