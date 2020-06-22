<?php

namespace App\Http\Controllers\Admin\Watches;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Admin\Watches;
use Illuminate\Pagination\Paginator;


class WatchController extends Controller
{
    function operator()
    {
        return view('admin/watches/create');
    }

    function index()
    {
        $product = DB::table('product')->get();
        return view("admin/watches/index",["index"=>$product]);
    }
    function store(Request $request)
    {    
        $name = $request->input("name");
        $oldPrice = $request->input("oldPrice");
        $newPrice = $request->input("newPrice");
        $description = $request->input("description");
        $filePath = $request->file('image')->store("public");
       
        DB::table('product')->insert(["name"=>$name,"oldPrice"=>$oldPrice,"newPrice"=>$newPrice,"description"=>$description,"image"=>$filePath]);
        return redirect('/admin/watches');   
    }
    

    function edit($id)
    { 
        $product = DB::table('product')->find($id);
        return view("admin/watches/edit",["edit"=>$product]);
       
    } 

    function update(Request $request, $id)
    {
        $name = $request->name;
        $oldPrice = $request->oldPrice;
        $newPrice = $request->newPrice;
        $description = $request->description;
        $filePath = $request->file('image')->store("public");

        DB::table('product')->where("id",$id)->update(["id"=>$id,"name"=>$name,"oldPrice"=>$oldPrice,"newPrice"=>$newPrice,"description"=>$description,"image"=> $filePath ]);
        return redirect('/admin/watches');   
    }
    function destroy($id)
    {
        DB::table('product')->delete(["id"=>$id]);
        return redirect('/admin/watches');
    }

    function detail($id)
    {
        $product = DB::table('product')->find($id);
        return view("/user/watches/show",["show"=>$product]);
    }

    function search(Request $request)
    {
        $search = $request->get('search');

        $watches = DB::table('product')->where('name','like','%',$search,'%')->paginate();
        return view('admin/watches/index',['index'=>$watches]);
    }

    

    
    
}