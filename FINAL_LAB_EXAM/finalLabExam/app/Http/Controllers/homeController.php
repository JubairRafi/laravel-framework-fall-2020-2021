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
    public  function create(){
        return view('home.register');
    }

    public  function store(Request $req){
        //$req->validate([
        //   'name' => 'required|min:3',
        //     'email'=> 'required',
        //     'cgpa' => 'required'
        // ])->validate();

        
        	
        		
                $user = new User();


                $user->username     = $req->username;
                $user->password     = $req->password;
                $user->employeeName = $req->name;
                $user->contactNo    = $req->contactNo;


                if($user->save()){
                    return redirect()->route('home.employeelist');
                }else{
                    return back();
                }

        	}
        


    public function employeelist(){
        $users =User::all();

        return view('home.employeelist')->with('users',$users);
    }

    public function show($id){
        // echo $id;
        $user = User::find($id);

        //return view('home.employeedetails', $user);
        }

    public function edit($id){
      $user = User::find($id);
        return view('home.updateEmployee', $user);
         }

    public function update($id, Request $req){

            $user = User::find($id); 
            $user->username     = $req->username;
            $user->password     = $req->password;
            $user->employeeName = $req->name;
            $user->contactNo    = $req->contact;
            $user->save();
    
            return redirect()->route('home.employeelist');
        }

    public function delete($id){
        $user = User::find($id); 
        return view('home.delete', $user);

         }

   

    public function destroy($id){
        $user = User::find($id); 
        $user->delete();
        return redirect()->route('home.employeelist');
        }
}
