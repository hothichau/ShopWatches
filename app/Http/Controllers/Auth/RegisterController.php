<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Attempt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function operator()
    {
        return view('auth/register');
    }

    function register(Request $request)
    {   
        $request->validate([
            'username' => 'required',
            'password' => 'required|unique:users|min:3',
            'address' => 'required',
            'phone' => 'required',
        ]); 
        $username = $request->input('username');
        $password = $request->input('password');
        $address = $request->input('address');
        $phoneNumber = $request->input('phone');
        $phone = (int) $phoneNumber;
        $role = "user";
        $filePath = $request->file('image')->store("public");
        $hashPassword = Hash::make($password);
        $user = DB::table('users')->insert(['username'=>$username,'password'=>$hashPassword,'phone'=>$phone,'role'=>$role,'address'=>$address,'image'=>$filePath]);
        return redirect()->route('auth.login');
    }
}
