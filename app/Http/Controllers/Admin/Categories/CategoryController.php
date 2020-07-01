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
        return view('admin.category.create');
    }

    function index()
    {
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function displayCateOnHeader()
    {
        $categories = Category::all();
        return view('partials.header',['categories'=>$categories]);
    }

    function store(Request $request)
    {    
        $request->validate([
            'name' => 'required',
        ]); 
        $name = $request->input('name');
        
        $category = new Category;
        $category->name = $name;
        $category->save();
        return redirect('/admin/categories');   
    }
    

    function edit($id)
    { 
       
        $categories = Category::find($id);
        return view("admin.category.edit",["cate"=>$categories]);
       
    } 

    function update(Request $request, $id)
    {
        $name = $request->name;
        $category = Category::find($id);
        $category->name = $name;
        $category->save();
        return redirect('/admin/categories');   
    }
    function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin/categories'); 
    }

    
    function search(Request $request)
    {
        $search = $request->get('search');

        $watches = DB::table('products')->where('name','like','%',$search,'%')->paginate();
        return view('admin/watches/index',['index'=>$watches]);
    }

}

