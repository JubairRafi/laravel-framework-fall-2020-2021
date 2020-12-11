<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;

class homeController extends Controller
{
    function index(Request $req){
        // $data = ['id'=>123,'name'=>'rafi'];
        // return view('home.index',$data);

        $id = 123;
        $name = $req->session()->get('username');
        return view('home.index', compact('id', 'name'));
    }

    function create(){
        return view('home.create');
    }
    function store(userRequest $req){
        // $req->validate([
        //     'name' => 'required|min:3',
        //     'email'=> 'required',
        //     'cgpa' => 'required'
        // ])->validate();
        return redirect('/userlist');
    }

    function userlist(){
        $users =$this->getUserlist();

        return view('home.userlist')->with('users',$users);
    }

    function show($id){
        $users = $this->getuserdetails($id);
        // echo $id;

        return view('home.userdetails')->with('users',$users);
        }

    function edit($id){
       echo $id;
         }

    function delete($id){
        $users = $this->deleteuser($id);
        // echo $id;

        return view('home.userlist')->with('users',$users);
         }

   function update($id){
        echo $id;
        }

    function destroy($id){
        echo $id;
        }

    private function getUserlist(){
        
            $users =  [
                ['id'=> 1, 'name'=>'xyz', 'email'=>'xyz@aiub.edu', 'cgpa'=>4],
                ['id'=> 2, 'name'=>'abc', 'email'=>'abc@aiub.edu', 'cgpa'=>3],
                ['id'=> 3, 'name'=>'asd', 'email'=>'asd@aiub.edu', 'cgpa'=>3.5],
                ['id'=> 4, 'name'=>'pqr', 'email'=>'pqr@aiub.edu', 'cgpa'=>2.4],
                ['id'=> 5, 'name'=>'alamin', 'email'=>'alamin@aiub.edu', 'cgpa'=>1.2]
            ];
        
        
        return $users;
    }

    private function getuserdetails($id){

        $users =  [
            ['id'=> 1, 'name'=>'xyz', 'email'=>'xyz@aiub.edu', 'cgpa'=>4],
            ['id'=> 2, 'name'=>'abc', 'email'=>'abc@aiub.edu', 'cgpa'=>3],
            ['id'=> 3, 'name'=>'asd', 'email'=>'asd@aiub.edu', 'cgpa'=>3.5],
            ['id'=> 4, 'name'=>'pqr', 'email'=>'pqr@aiub.edu', 'cgpa'=>2.4],
            ['id'=> 5, 'name'=>'alamin', 'email'=>'alamin@aiub.edu', 'cgpa'=>1.2]
        ];
        for($i=0; $i < count($users); $i++){
            if ($id==$users[$i]['id']) {
                $users = [
                    ['id'=>$users[$i]['id'] , 'name'=>$users[$i]['name'], 'email'=>$users[$i]['email'], 'cgpa'=>$users[$i]['cgpa']]
                ];
            }
        }

        return $users;

    }

    private function deleteuser($id){
        $users =  [
            ['id'=> 1, 'name'=>'xyz', 'email'=>'xyz@aiub.edu', 'cgpa'=>4],
            ['id'=> 2, 'name'=>'abc', 'email'=>'abc@aiub.edu', 'cgpa'=>3],
            ['id'=> 3, 'name'=>'asd', 'email'=>'asd@aiub.edu', 'cgpa'=>3.5],
            ['id'=> 4, 'name'=>'pqr', 'email'=>'pqr@aiub.edu', 'cgpa'=>2.4],
            ['id'=> 5, 'name'=>'alamin', 'email'=>'alamin@aiub.edu', 'cgpa'=>1.2]
        ];
        for($i=0; $i < count($users); $i++){
            if ($id==$users[$i]['id']) {
                array_splice($users, $i-1, $i);
            }
        }

        return $users;
    }
}
