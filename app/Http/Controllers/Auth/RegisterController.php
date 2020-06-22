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
        $username = $request->input('username');
        $password = $request->input('password');
        $phoneNumber = $request->input('phone');
        $phone = (int) $phoneNumber;
        $role = "user";
        $filePath = $request->file('image')->store("public");
        $hashPassword = Hash::make($password);
        $user = DB::table('users')->insert(['username'=>$username,'password'=>$hashPassword,'phone'=>$phone,'role'=>$role,'image'=>$filePath]);
        return redirect()->route('auth.login');
    }
}
