<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
class HomeController extends Controller
{
    
    function index()
    {
        $products = Product::all();
        $category = Category::all();
        return view("user.home",["body"=>$products,"cate"=>$category]);
    }
    function search(Request $request)
    {
        $txt = $request->input('txtSearch');
        $search = DB::table('products')->where('name','LIKE','%'.$txt.'%')->get();
        return view('admin.watches.find',['research'=>$search]);
    }
    
    
}