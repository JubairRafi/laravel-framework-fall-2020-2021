<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Validator;


class homeController extends Controller
{
    public function index(Request $req){
    

        //$name = $req->session()->get('username');
        return view('home.index');
    }
}
