<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Validator;

class homeController extends Controller
{
   public function index(Request $req){
        // $data = ['id'=>123,'name'=>'rafi'];
        // return view('home.index',$data);

        $id = 123;
        $name = $req->session()->get('username');
        return view('home.index', compact('id', 'name'));
    }

    public  function create(){
        return view('home.create');
    }
    public   function store(UserRequest $req){
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

    public function userlist(){
        $users =User::all();

        return view('home.userlist')->with('users',$users);
    }

    public function show($id){
        // echo $id;
        $user = User::find($id);

        return view('home.userdetails', $user);
        }

    public function edit($id){
      $user = User::find($id);
      return view('home.edit', $user);
         }

    public function update($id, Request $req){

            $user = User::find($id); 
            $user->username     = $req->username;
            $user->password     = $req->password;
            $user->name         = $req->name;
            $user->dept         = $req->dept;
            $user->cgpa         = $req->cgpa;
            $user->type         = $req->type;
            $user->save();
    
            return redirect()->route('home.userlist');
        }

    public function delete($id){
        $user = User::find($id); 
        return view('home.delete', $user);

         }

   

    public function destroy($id){
        $user = User::find($id); 
        $user->delete();
        return redirect()->route('home.userlist');
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
