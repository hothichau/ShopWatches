<?php
namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Cart;
class HomeController extends Controller
{
    
    function index(Request $request)
    {
        $page = $request->page;
        $category = Category::all();
        $request->session()->put('categories',$category);
        $products = Product::all()->skip($page * 8)->take(8);
                    if($products->isEmpty()){ //Nếu photo lớn hơn số lượng trong database sẽ trả về 0
                            $products = Product::all()->take(8);
                        return redirect('user/home/?page=0');
                    }else if($page<0){
                        $totalPage = round(count(Product::all())/8)-1;
                        return redirect('user/home/?page='.$totalPage);
                    }

        if(Auth::user())
        {
            $id_user = Auth::user()->id;
            $cart = Cart::where('user_id','=',$id_user)->get();
            $quantity = 0;
            foreach($cart as $c)
            {
                $quantity += $c->quantity;
            }      
           
        }
        else
        {    
            $quantity = 0;
        }
        $request->session()->put('totalQuantity',$quantity);
        return view('user.home', ["product" => $products, "page" => $page]);
    }

    function searchByProName(Request $request)
    {   
        $search = $request->get('search');
        $watches = Product::where( 'name', 'LIKE', '%' . $search . '%' )->orWhere( 'new_price', 'LIKE', '%' . $search . '%' )->get();
        return view('admin.watches.find',['product'=>$watches,"search"=>$search]);
    }

    function displayProCate($id){
        
        $cate = Category::all();
        $product = Product::where('category_id','=',$id)->get();
        foreach($cate as $category)
        {
            if($category->id == $id)
            {
                $cate_name = $category->name;
                return view('admin.category.proOfCate',["procate" => $product,"categories"=>$cate_name]);
            }
            
        }
       }
       function ascProductByPrice(Request $request){
        $page = $request->page;
        $products = Product::orderBy('new_price', 'asc')->get();
        return view("user.home",['product'=>$products,"page" => $page]);
        }

        function descProductByPrice(Request $request){
            $page = $request->page;
            $products = Product::orderBy('new_price', 'desc')->get();
            return view("user.home",['product'=>$products,"page" => $page]);
            }
        
    
}