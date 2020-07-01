<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Category;

class DashboardController extends Controller
{
    function operator(){
        
        $category = Category::all();
        return view('admin/dashboard', ["cate"=>$category]);
        // return view('admin/dashboard');
    }

    
}