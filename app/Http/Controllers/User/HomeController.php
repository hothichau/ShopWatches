<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
class HomeController extends Controller
{
    
    function index(Request $request)
    {
        $page = $request->page;
        $category = Category::all();
        $products = Product::all()->skip($page * 8)->take(8);
        if($products->isEmpty()){ //Nếu photo lớn hơn số lượng trong database sẽ trả về 0
                $products = Product::all()->take(8);
            return redirect('user/home/?page=0');
        }else if($page<0){
            $totalPage = round(count(Product::all())/8)-1;
            return redirect('user/home/?page='.$totalPage);
        }

        return view('user.home', ["product" => $products, "cate"=>$category, "page" => $page]);
        
    }
    function search(Request $request)
    {
        $txt = $request->input('txtSearch');
        $search = DB::table('products')->where('name','LIKE','%'.$txt.'%')->get();
        return view('admin.watches.find',['research'=>$search]);
    }
    
    
}