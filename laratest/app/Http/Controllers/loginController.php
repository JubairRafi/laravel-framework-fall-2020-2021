<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class loginController extends Controller
{
   public function index(){
       return view('login.index');
   }
   public function verifyy(Request $req){
       if ($req->username == $req->password) {
           return redirect('/home');
       }else{
           return redirect('/login');
       }
   }
}
