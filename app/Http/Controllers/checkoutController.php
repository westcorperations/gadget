<?php

namespace App\Http\Controllers;
use Alert;
use App\Http\Controllers\Controller;
use App\Models\Cart;
 use App\Models\Product;
 use App\Models\User;
 use App\Models\Order;
 use App\Models\Order_items;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;


class checkoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
foreach ($old_cartitems as $item) {
    if (!Product::where('id',$item->product_id)->where('quantity','>=',$item->product_qty)->exists()) {
           $removecart = Cart::where('user_id',Auth::id())->where('product_id',$item->product_id)->first();
           $removecart->delete();
    }
}

$cartitems = Cart::where('user_id',Auth::id())->get();
return view('checkout', compact('cartitems'));

    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
         $order->payment_mode = $request->input('payment_mode');
         $order->payment_id = $request->input('payment_id');

        // to calculate the total price
                $total = 0;
                    $cartitems_total = Cart::where('user_id',Auth::id())->get();
                        foreach($cartitems_total as $prod){
                                    $total+=$prod->product->selling_price * $prod->product_qty ;
                                            }
        $order->total_price = 0.05 * $total + $total;
        $order->tracking_number =  'westcorp'.rand(1111,9999);
        $order->save();
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems as $item) {
            Order_items::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'Qty' => $item->product_qty,
                'price' => $item->product->selling_price,

            ]);
            $prod = Product::where('id',$item->product_id)->first();
            $prod->quantity =  $prod->quantity - $item->product_qty;
            $prod->update();
        }
if (Auth::user()->address2 == NULL) {
    $user= User::where('id',Auth::id())->first();
    $user->name = $request->input('name');
    $user->lastname = $request->input('lastname');
    $user->phone = $request->input('phone');
    $user->address = $request->input('address1');
    $user->address2 = $request->input('address2');
    $user->city = $request->input('city');
    $user->state = $request->input('state');
    $user->country = $request->input('country');
    $user->pincode = $request->input('pincode');
   $user->update();
}
$cartitems = Cart::where('user_id',Auth::id())->get();
Cart::destroy($cartitems);

if ( $request->input('payment_mode') == "paid with paystack") {
   return response()->json(['status' => "Order Placed Successfull"]);
}
return redirect('/')->with('Status', 'Order Placed Successfull');
    }







    public function proceedtopay(Request $request)
    {
$cartitems = Cart::where('user_id',Auth::id())->get();
$total_price = 0;

foreach($cartitems as $items)
{
    $total_price+=$items->product->selling_price * $items->product_qty;
}
    $firstname = $request->input('firstname');
    $lastname  = $request->input('lastname');
    $email  = $request->input('email');
    $phone  = $request->input('phone');
    $address1  = $request->input('address1');
    $address2  = $request->input('address2');
    $city  = $request->input('city');
    $state  = $request->input('state');
    $country  = $request->input('country');
    $pincode = $request->input('pincode');
    return response()->json([
'firstname'=>$firstname,
'lastname'=>$lastname,
'email'=>$email,
'phone'=>$phone,
'address1'=>$address1,
'address2'=>$address2,
'city'=>$city,
'state'=>$state,
'country'=>$country,
'pincode'=>$pincode,
'total_price' => 0.05 * $total_price + $total_price,

    ]);
    }
}
