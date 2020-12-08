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

    function create(){
        return view('home.create');
    }
    function store(){
        return redirect('/userlist');
    }

    function userlist(){
        $users =$this->getUserlist();

        return view('home.userlist')->with('users',$users);
    }

    private function getUserlist(){
        return [
            ['id'=> 1, 'name'=>'xyz', 'email'=>'xyz@aiub.edu', 'cgpa'=>4],
            ['id'=> 2, 'name'=>'abc', 'email'=>'abc@aiub.edu', 'cgpa'=>3],
            ['id'=> 3, 'name'=>'asd', 'email'=>'asd@aiub.edu', 'cgpa'=>3.5],
            ['id'=> 4, 'name'=>'pqr', 'email'=>'pqr@aiub.edu', 'cgpa'=>2.4],
            ['id'=> 5, 'name'=>'alamin', 'email'=>'alamin@aiub.edu', 'cgpa'=>1.2]
        ];
    }
}
