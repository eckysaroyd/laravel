<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{
    //sample view a dashboard
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(Request $request){
       if($request->isMethod('post')){
        $data=$request->all();

        //normal validation
        // $validated = $request->validate([
        //     'email' => 'required|email|max:255',
        //     'password' => 'required',
        // ]);
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        $customMessages = [
            //add custom Message here
            'email.required'=>'Email address is required',
            'email.email'=>'Valid Email address is required',
            'password.required'=>'Password is required',
        ];
        $this->validate($request,$rules,$customMessages);
        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){

            return redirect("admin/dashboard");
        }else{
            // echo "<pre>";
            // print_r($data);
            // die();
            return redirect()->back()->with("error_message","invalid Email or Password");
        }
       }
        return view('admin.login');

    }
    public function logout(){
        Auth::guard('admin')->logout();

        return redirect("admin/login");
    }
}
