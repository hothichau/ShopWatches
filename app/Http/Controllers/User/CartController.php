<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
use App\Cart;

class CartController extends Controller
{
   
    function index(){
        if(Auth::user() != "")
        {
            $user_id = Auth::user()->id;
            $cart = DB::table('carts')
            ->where('user_id',$user_id)
            ->join('products','carts.pro_id','=','products.id')
            ->select('products.id','products.image','products.name','products.new_price', 'carts.quantity')
            ->get();
            return view('user.cart',['carts'=>$cart]);
        }
        else
        {
            return redirect()->route('auth.login',['Invalid username or password!']);
           
        }
       
    }
    function addToCart($pro_id){
        if(Auth::user())
        {
            $user_id = Auth::user()->id;
            $date = now();
            $check = DB::table('carts')
            ->where('pro_id',$pro_id)
            ->where('user_id',$user_id)
            ->count();
            if($check == 0)
            {
                $cart = DB::table('carts')->where('pro_id','=',$pro_id)->first();
                if (!$cart){
                    DB::table('carts')->insert(
                        ['pro_id'=>$pro_id, 'quantity' => 1, 'user_id' => $user_id, 'date_order'=>$date]
                    );
                    return redirect('cart');
                }
            }
            else
                {  
                    $cart = DB::table('carts')->where('pro_id','=',$pro_id)->first();
                    $quantity = $cart->quantity +1;
                    DB::table('carts')
                    ->where('pro_id','=',$pro_id)
                    ->where('user_id',$user_id)
                    ->update(
                        ['quantity' => $quantity, 'date_order'=>$date]
                    );
                    return redirect('cart');
                }
        }else
        {
            return redirect()->route('auth.login',['Invalid username or password!']);
        }
        
    }

    function destroyCartPro($pro_id){
        DB::table('carts')->where ('pro_id','=',$pro_id)->delete();
        return redirect('cart');
    }

    function increaseQuantity($pro_id,Request $request)
    {   
        $cart = DB::table('carts')->where('pro_id','=',$pro_id)->first();
        $quantity = $cart->quantity + 1;
        DB::table('carts')
            ->where('pro_id','=',$pro_id)
            ->update(
                ['quantity' => $quantity]
            );
            return redirect ('cart');  

    }

    function decreaseQuantity($pro_id,Request $request)
    {
        $cart = DB::table('carts')->where('pro_id','=',$pro_id)->first();
        $quantity = $cart->quantity - 1;
        if($quantity < 1)
        {
            $quantity = 1;
            DB::table('carts')
            ->where('pro_id','=',$pro_id)
            ->update(
                ['quantity' => $quantity]
            );
            return redirect ('cart');    
        }
        else
        {
            DB::table('carts')
            ->where('pro_id','=',$pro_id)
            ->update(
                ['quantity' => $quantity]
            );
            return redirect ('cart');    
        }

    }

}