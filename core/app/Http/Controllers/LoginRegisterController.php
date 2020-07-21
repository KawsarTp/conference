<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    //Login Method
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request){
    	$this->validate($request,[

    		'username'=>'required',
    		'password'=>'required',

    	]);
    	$username = $request->username;
    	$password = $request->password;
    	
    	if(auth()->guard('admin')->attempt(['username'=>$username,'password'=>$password])){
    		return redirect()->route('admin.home')->with('success','login Success');
    	}
    	return redirect()->back()->with('error','login Failed');
    }

    public function logout(){
    	auth()->guard()->logout();

    	return redirect()->route('admin.login')->with('success','logout Success');
    }
}
