<?php

namespace App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Admin\Users;
use App\User;
use App\Category;
class UserController extends Controller
{
    function operator()
    {
        return view('/admin/users/create');
    }
    function index()
    {
        $users = User::all();
        $category = Category::all();
        return view("admin/users/index",["index"=>$users, "cate"=>$category]);
    }

    function edit($id)
    { 
        $users = User::all()->find($id);
        return view("admin/users/edit",["edit"=>$users]);
       
    } 
    function store(Request $request)
    {    
        $username = $request->input("username");
        $password = $request->input("password");
        $role = "admin";
        $phone = $request->input("phone");
        $address = $request->input("address");
        $filePath = $request->file('image')->store("public");
       
        DB::table('products')->insert(["username"=>$name,"password"=>$password,"phone"=>$phone,"address"=>$address,"role"=>$role,"image"=>$filePath]);
        return redirect('/admin/users');   
    }

    function update(Request $request, $id)
    {
        $username = $request->username;
        $password = $request->password;
        $address = $request->address;
        $user_pass = DB::table('users')->where('id','=',$id)->first();
        if($password == $user_pass->password)
        {
            $pass = $password;
        }
        else
        {
            $pass = Hash::make($password);
        }
        $phoneNumber = $request->phone;
        $phone = (int) $phoneNumber;
        $role = "admin";
        $filePath = $request->file('image')->store("public");
        
        
        DB::table('users')->where("id",$id)->update(["id"=>$id,"username"=>$username,"password"=>$pass,"phone"=>$phone,"address"=>$address,"image"=> $filePath,"role"=>$role]);
        return redirect('/admin/users');   
    }

    function destroy($id)
    {
        DB::table('users')->delete(["id"=>$id]);
        return redirect('/admin/users');
    }

}