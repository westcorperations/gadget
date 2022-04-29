<?php

namespace App\Http\Controllers;
use Alert;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewcart()
    {
        $cartItems = Cart::where('user_id',Auth::id())->get();


        return view('cart',compact('cartItems'));
    }
    public function cartcount()
    {
        if (Auth::check()) {
            $count = Cart::where('user_id',Auth::id())->count();
        } else {
           $count = 0;
        }
    return response()->json(['count' =>$count]);
    }


    public function add(Request $request)
    {
       $prod_id = $request->input('product_id');
        $prod_qty = $request->input('product_qty');
       if (Auth::check())
         {            $prod_check = Product::where('id',$prod_id)->first();
                       if ($prod_check) {
               if (Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()) {

           return response()->json(['status' =>$prod_check->name."Already Added To Cart"]);

                }
               else{
               $cartItem = new Cart();
               $cartItem->product_id = $prod_id;
                              $cartItem->user_id =Auth::id();
               $cartItem->product_qty = $prod_qty;
              $cartItem->save();
          return response()->json(['status' =>$prod_check->name."Added To Cart"]);              }
            }
        }
       else
        {
          return response()->json(['status' =>"Login to Continue"]);
       }

    }


    public function deleteCart(Request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->input('product_id');
            if (Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()) {
                $cartItem = Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
          return response()->json(['status' =>"Product Removed from Cart"]);

            }


        }else{
          return response()->json(['status' =>"Login to Continue"]);

        }

    }



    public function updateCart(Request $request)
{
   if (Auth::check()) {
$prod_id = $request->input('product_id');
$prod_qty = $request->input('product_qty');
if (Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()) {
    $cart = Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first();
    $cart->product_qty = $prod_qty;
    $cart->update();
    return response()->json(['status' =>"quantity updated"]);

}
   }
   else {
    return response()->json(['status' =>"Login to Continue"]);

   }
}
}
