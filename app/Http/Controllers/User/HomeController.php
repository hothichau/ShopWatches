<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    function index()
    {
        $product = DB::table('product')->get();
        return view("user/home",["body"=>$product]);
    }

    function addToCart($id)
    { 
        // $product = DB::table('product')->find($id);
        // return view("/user/cart",["cart"=>$product]);

        $cart = DB::table('cart')
            ->join('users', 'users.id', '=', 'cart.id_user')
            ->join('product', 'users.id', '=', 'product.id')
            ->select('cart.quantity', 'product.name', 'product.newPrice')
            ->get();

            echo $cart;
       
    } 

    function destroy($id)
    {
        DB::table('product')->delete(["id"=>$id]);
        return redirect('/user/cart');
    }
    

    function search(Request $request)
 {
   $txt = $request->input('txtSearch');
   $search = DB::table('product')->where('name','LIKE','%'.$txt.'%')->get();
   return view('admin/watches/find',['research'=>$search]);
}
    
    
}
