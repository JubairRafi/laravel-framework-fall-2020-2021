<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    function index(){
        // $data = ['id'=>123,'name'=>'rafi'];
        // return view('home.index',$data);

        $id = 1231;
        $name = 'Rafi';

        return view('home.index',compact('id','name'));
    }
}
