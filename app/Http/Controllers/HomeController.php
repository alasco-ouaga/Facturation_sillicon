<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $connect = Auth::user();
        if($connect == null){
            return view('auth.login');   
        }
        if($connect != null){
                $user = auth()->user();
                return view('admin.home',\compact('user'));
        }
    }

    public function  admin_logout()
    {
            $user = auth()->user();
            Auth::logout($user);
            return view('auth.login');   
    }
}
