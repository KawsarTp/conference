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
}
