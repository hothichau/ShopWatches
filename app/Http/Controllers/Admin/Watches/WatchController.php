<?php

namespace App\Http\Controllers\Admin\Watches;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Admin\Watches;
use Illuminate\Pagination\Paginator;
use App\Category;
use App\Product;

class WatchController extends Controller
{
    function operator()
    {
        $categories = Category::all();
        return view('admin.watches.create',['categories'=>$categories]);
    }

    function index()
    {
        
        $products = Product::all();
        foreach($products as $product){
            $product->category->name;
        }
        return view("admin/watches/index",["index"=>$products]);
    }

    function store(Request $request)
    {    
        
        $name = $request->input("name");
        $oldPrice = $request->input("old_price");
        $newPrice = $request->input("new_price");
        $description = $request->input("description");
        $category_id = $request->input("category_id");
        $filePath = $request->file('image')->store("public");
       
        DB::table('products')->insert(["name"=>$name,"old_price"=>$oldPrice,"new_price"=>$newPrice,"description"=>$description,"image"=>$filePath,"category_id"=>$category_id]);
        return redirect('/admin/watches');   
    }
    

    function edit($id)
    { 
       
        $products = Product::all()->find($id);
        $categories = Category::all();
        return view("admin/watches/edit",["edit"=>$products],["cate"=>$categories]);
       
    } 

    function update(Request $request, $id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $name = $request->name;
        $oldPrice = $request->old_price;
        $newPrice = $request->new_price;
        $description = $request->description;
        $category_id = $request->category_id;
        
        $filePath = $request->file('image')->store("public");

        DB::table('products')->where("id",$id)->update(["id"=>$id,"name"=>$name,"old_price"=>$oldPrice,"new_price"=>$newPrice,"description"=>$description,"image"=> $filePath,"category_id"=>$category_id]);
        return redirect('/admin/watches');   
    }
    function destroy($id)
    {
        DB::table('products')->delete(["id"=>$id]);
        return redirect('/admin/watches');
    }

    function detail($id)
    {   
        $product = Product::find($id);
        $categories = Category::all();
        return view("/user/watches/show",["show"=>$product,"cate" => $categories]);
    }

    function search(Request $request)
    {
        $search = $request->get('search');
        $categories = Category::all();
        // $watches = DB::table('products')->where('name','like','%',$search,'%')->paginate();
        // return view('admin/watches/index',['index'=>$watches,"cate" => $categories,"search"=>$search]);
        
        echo $search;
        // $watches = Product::search($search)->where('name','like','%',$search,'%')->paginate();
        // return view('admin/watches/index',['index'=>$watches,"cate" => $categories,"search"=>$search]);
        
    }

}