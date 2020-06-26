<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Attempt;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function operator()
    {
        return view('auth/login');
    }

    function login(Request $request)
    {   
        $request->validate([
            'username' => 'required',
            'password' => 'required|unique:users|min:3'
        ]);
        
        $username = $request->input('username');
        $password = $request->input('password');
        

        if(Auth::attempt(['username' => $username, 'password'=>$password]))
        {
            $user = Auth::user();
            if($user->role == "admin")
            {
                return redirect()->route('admin.dashboard');
            }
            else
            {
                return redirect()->route('user.home');
            }
        }
        else
        {
            return redirect()->route('auth.login',['Invalid username or password!']);
        }

    }

    function logout(Request $request)
    {   
      
        Auth::logout();
        return redirect('/user/home');
    }
}
