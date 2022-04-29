<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','0')->get();
       return view('admin.orders.index',compact('orders'));
    }  
    public function vieworder($id)
    {
        $orders = Order::where('id',$id)->first(); 
        return view('admin.orders.view-order',compact('orders'));
    }
    public function deliverorder(Request $request,  $id)
    {
    $orders = Order::where('id',$id)->first();
    $orders->status = $request->input('status'); 
    $orders->update(); 
    return redirect('orders')->with('Status', 'Order status updated successfully');
    }  
    public function orderhistory()
    {
        $orders= Order::where('status','1')->get(); 
        return view('admin.orders.history',compact('orders'));
    }
}
