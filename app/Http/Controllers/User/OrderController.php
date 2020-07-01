<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Cart;
use App\Order;
use App\Promotion;

class OrderController extends Controller
{
    function showOrder()
    {   
        $id = Auth::user()->id;
        $cart=  Cart::where('user_id',$id)->get();
        return view('user.order',['carts'=>$cart]);
    }

    function store1(Request $request){
        // $id = Auth::user()->id;
        // $bill = new Order();
        // $bill->user_id = $id;
        // $promo = Promotion::where('code',$request->code)->first();
        // if(!$promo){
        //     $bill->promote_value = 0;
        // }
        // else {
        //     $bill->promote_value = $promo->value;
        // }
        // $carts = Cart::where('user_id',$id)->get();
        // foreach($carts as $item){
        //     $bill->total_product+=$item->quantity;
        //     $pro = Product::find($item->pro_id);
        //     $bill->total_price+=$pro->new_price*$item->quantity;
        // }
        // //$carts = Cart::where('user_id',$id)->get();
        // $products= json_encode($carts);
        // $bill->product = $products;
        // $bill->payment = 'Card';
        // $bill->status = "Delivering";
        // $bill->save();

        // $cart = Cart::where('user_id',$id)->delete();

        // return redirect('user/home');
        }
        function order(Request $request){
            $id_user = Auth::user()->id;

            $name = $request->username;
            $phone= $request->phone;
            $address= $request->address;
            $discount = $request->code;
            
            $promote_code = Promotion::where('code', $discount)->value('value');

            $total_product = 0;
            $total_price = 0;
            $fee = 35000;
            $arrayProduct = [];
            $bill = new Order();
            $carts = Cart::where('user_id',$id_user)->get();
            foreach($carts as $item){
                $bill->total_product+=$item->quantity;
                $pro = Product::find($item->pro_id);
                $bill->total_price+=$pro->new_price*$item->quantity;
            
                $arrayProduct[] = array(
                'image'=>$pro->image,
                'name' =>$pro->name,
                'quantity' =>$pro->quantity,
                'price' =>$pro->new_price,
                );

            }
            
            if($promote_code >0){
            $total_price=$total_price +($promote_code * $total_product)/100 + $fee;
            }else{
            $total_price=$total_price +$total_product+ $fee;
            }

            $proDetail = json_encode($arrayProduct);    
            //$discount = Promotion::all();
    
            
            $bill->user_id=$id_user;
            $bill->username=$name;
            $bill->phone=$phone;
            $bill->address =$address;
            $bill->status = "Đang vận chuyển";
            $bill->promote_value = 20;
            //$info->percent =30;
            $bill->total_price =  $total_price;
            $bill->total_product =  $total_product;
            $bill->product = $proDetail;
            $bill->payment = "Trả tiền mặt";
            $bill->save();
            $cart = Cart::where('user_id',$id_user)->delete();
            return redirect('/user/home');
        }
    
    

    function showBill()
    {
       $bill = Order::all();
       foreach($bill as $b)
       {
           $b->user->username;
           $b->user->phone;
           $b->user->address;
       }
       return view('admin.orders.index',['index'=>$bill]);
        
    }
}


