<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
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
    function store(UserRequest $req){
        // $req->validate([
        //     'name' => 'required|min:3',
        //     'email'=> 'required',
        //     'cgpa' => 'required'
        // ])->validate();

        if($req->hasFile('myimg')){

        	$file = $req->file('myimg');
        	/*echo "File Name: ".$file->getClientOriginalName()."<br/>";
        	echo "File Extension: ".$file->getClientOriginalExtension()."<br/>";
        	echo "File Size: ".$file->getSize();*/

        	if($file->move('upload', $file->getClientOriginalName())){
        		
                $user = new User();
                $user->username     = $req->username;
                $user->password     = $req->password;
                $user->type         = $req->type;
                $user->name         = $req->name;
                $user->cgpa         = $req->cgpa;
                $user->dept         = $req->dept;
                $user->profile_img  = $file->getClientOriginalName();

                if($user->save()){
                    return redirect()->route('home.userlist');
                }else{
                    return back();
                }

        	}else{
        		return back();
        	}
        }
        //return redirect('/userlist');
    }

    function userlist(){
        $users =User::all();

        return view('home.userlist')->with('users',$users);
    }

    function show($id){
        // echo $id;
        $user = ['id'=> 1, 'name'=>'xyz', 'email'=>'xyz@aiub.edu', 'cgpa'=>4, 'img'=>'2.jpg'];

        return view('home.userdetails', $user);
        }

    function edit($id){
       echo $id;
         }

    function delete($id){
       

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

}
