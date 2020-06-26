<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Admin\Categories;
use Illuminate\Pagination\Paginator;
use App\Category;
use App\Product;
class CategoryController extends Controller
{

    function operator()
    {
        $categories = Category::all();
        return view('admin.category.create',['categories'=>$categories]);
    }

    function index()
    {
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function displayCate()
    {
        $categories = Category::all();
        return view('partials.header',['categories'=>$categories]);
       
       
    }

    function store(Request $request)
    {    
        $name = $request->input("name");
       
       
        DB::table('categories')->insert(["name"=>$name]);
        return redirect('/admin/categories');   
    }
    

    function edit($id)
    { 
       
        $categories = Category::find($id);
        return view("admin.category.edit",["cate"=>$categories]);
       
    } 

    function update(Request $request, $id)
    {
     
        $category = Category::find($id);
        $name = $request->name;
       
        DB::table('categories')->where("id",$id)->update(["id"=>$id,"name"=>$name]);
        return redirect('/admin/categories');   
    }
    function destroy($id)
    {
        DB::table('categories')->delete(["id"=>$id]);
        return redirect('/admin/categories');
    }

    
    function search(Request $request)
    {
        $search = $request->get('search');

        $watches = DB::table('products')->where('name','like','%',$search,'%')->paginate();
        return view('admin/watches/index',['index'=>$watches]);
    }

}

