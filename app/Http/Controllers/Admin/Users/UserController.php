<?php

namespace App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Admin\Users;

class UserController extends Controller
{
    function operator()
    {
        return view('/admin/users/create');
    }
    function index()
    {
        $users  = DB::table('users')->get();
        return view("admin/users/index",["index"=>$users]);
    }

    function edit($id)
    { 
        $users = DB::table('users')->find($id);
        return view("admin/users/edit",["edit"=>$users]);
       
    } 
    function store(Request $request)
    {    
        $username = $request->input("username");
        $password = $request->input("password");
        $role = "admin";
        $phone = $request->input("phone");
        $filePath = $request->file('image')->store("public");
       
        DB::table('product')->insert(["username"=>$name,"password"=>$password,"phone"=>$phone,"role"=>$role,"image"=>$filePath]);
        return redirect('/admin/users');   
    }

    function update(Request $request, $id)
    {
        $username = $request->username;
        $password = $request->password;
        $hashPassword = Hash::make($password);
        $phoneNumber = $request->phone;
        $phone = (int) $phoneNumber;
        $role = "admin";
        $filePath = $request->file('image')->store("public");

        DB::table('users')->where("id",$id)->update(["id"=>$id,"username"=>$username,"password"=>$hashPassword,"phone"=>$phone,"image"=> $filePath,"role"=>$role]);
        return redirect('/admin/users');   
    }

    function destroy($id)
    {
        DB::table('users')->delete(["id"=>$id]);
        return redirect('/admin/users');
    }

}