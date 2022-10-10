<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //sample view a dashboard
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(Request $request){
       if($request->isMethod('post')){
        $data=$request->all();
        echo "<pre>";
        print_r($data);
       }
        return view('admin.login');

    }
}
