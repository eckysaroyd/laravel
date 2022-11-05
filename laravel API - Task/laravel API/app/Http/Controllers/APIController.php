<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getUsers($id=null){
        if(empty($id)){
            $users = User::get();
            return response()->json(["users"=>$users]);
        }else{
            $users = User::find($id);
            return response()->json(["users"=>$users]);
        }
    }
    public function addUsers(request $request){
        if($request->isMethod('post')){
            $userData =$request->input();

            //simple laravel validation
            //check is any input is empty
            if(empty($userData['name']) || empty($userData['email']) ||  empty($userData['password'])){
                $error_message = "Please enter complete user details";
                return response()->json(["status"=>false,"message"=>$error_message],422);
            }
            //validate email
            if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                $error_message = "Please enter Valid Email";
                return response()->json(["status"=>false,"message"=>$error_message],422);
            }
            //validate if email is present
            $userCount = User::where('email',$userData['email'])->count();
            if($userCount>0){
                $error_message = "Email Already Exist..!!";
                return response()->json(["status"=>false,"message"=>$error_message],422);
            }
            if(isset($error_message)&&!empty($error_message)){
                return response()->json(["status"=>false,"message"=>$error_message],422);
            }

            $user = new User;
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = bcrypt($userData['password']);
            $user->save();
            return response()->json(['message'=>'User added successfully!']);
        }
    }
    public function addMultipleUsers(request $request){
    if($request->isMethod('post')){
        $userData = $request->input();
        // echo "<pre>";
        // print_r($userData);
        // die;
        foreach ($userData['users'] as $key => $value) {
            $user = new User;
            $user->name = $value['name'];
            $user->email = $value['email'];
            $user->password = bcrypt($value['password']);
            $user->save();
        }
        return response()->json(['message'=>'Users added successfully!']);
    }
    }

}
