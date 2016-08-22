<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\AuthService;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function login(Request $req)
    {
        $name = $req->get('name');
        $password = $req->get('password');
        if (AuthService::attempt($name, $password)) {

            return view('blank');
        } else {
            return view('result')->with('result', '認證失敗');
        }
    }

    public
    function logout()
    {
        Auth::logout();
        return view('login');
    }
}