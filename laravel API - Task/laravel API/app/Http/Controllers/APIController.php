<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Validator;

class APIController extends Controller
{
    public function getUsers($id=null){
        if(empty($id)){
            $users = User::get();
            return response()->json(["users"=>$users],200);
        }else{
            $users = User::find($id);
            return response()->json(["users"=>$users],200);
        }
    }
    public function addUsers(request $request){
        if($request->isMethod('post')){
            $userData =$request->input();

            //simple laravel validation
            //check is any input is empty
            // if(empty($userData['name']) || empty($userData['email']) ||  empty($userData['password'])){
            //     $error_message = "Please enter complete user details";
            //     return response()->json(["status"=>false,"message"=>$error_message],422);
            // }
            // //validate email
            // if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            //     $error_message = "Please enter Valid Email";
            //     return response()->json(["status"=>false,"message"=>$error_message],422);
            // }
            // //validate if email is present
            // $userCount = User::where('email',$userData['email'])->count();
            // if($userCount>0){
            //     $error_message = "Email Already Exist..!!";
            //     return response()->json(["status"=>false,"message"=>$error_message],422);
            // }
            // if(isset($error_message)&&!empty($error_message)){
            //     return response()->json(["status"=>false,"message"=>$error_message],422);
            // }

            //advanced POST API validation
           $rules= [
                "name"=>"required|regex:/^[a-zA-Z]+$/u",
                "email"=>"required|email|unique:users",
                "password"=>"required"
           ];
           $customMessage = [
                "name.required"=>"Name is required",
                "email.required"=>"Email is required",
                "email.email"=>"Valid Email is required",
                "email.unique"=>"User already exists in our database",
                "password.required"=>"Password is required"
           ];
           $validator =Validator::make($userData,$rules,$customMessage);
           if($validator->fails()){
                return response()->json($validator->errors(),422);
           }

            $user = new User;
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = bcrypt($userData['password']);
            $user->save();
            return response()->json(['message'=>'User added successfully!'],201);
        }
    }
    public function addMultipleUsers(request $request){
    if($request->isMethod('post')){
        $userData = $request->input();
        $rules= [
            "users.*.name"=>"required|regex:/^[a-zA-Z]+$/u",
            "users.*.email"=>"required|email|unique:users",
            "users.*.password"=>"required"
       ];
       $customMessage = [
            "name.required"=>"Name is required",
            "email.required"=>"Email is required",
            "email.email"=>"Valid Email is required",
            "email.unique"=>"User already exists in our database",
            "password.required"=>"Password is required"
       ];
       $validator =Validator::make($userData,$rules,$customMessage);
       if($validator->fails()){
            return response()->json($validator->errors(),422);
       }
        foreach ($userData['users'] as $key => $value) {
            $user = new User;
            $user->name = $value['name'];
            $user->email = $value['email'];
            $user->password = bcrypt($value['password']);
            $user->save();
        }
        return response()->json(['message'=>'Users added successfully!'],201);
    }
    }

}
