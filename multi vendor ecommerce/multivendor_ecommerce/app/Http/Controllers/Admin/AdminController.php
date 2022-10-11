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
