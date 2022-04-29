<?php

namespace App\Http\Controllers;
use Alert;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;


class pagesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }
    public function index()
    {
        $all = Product::all();
        $phones = Product::where('category_id', '1')->take(7)->get();
        $laptops = Product::where('category_id', '2')->take(7)->get();
        $assets =  Product::where('category_id', '3')->take(7)->get();

        return view('index',compact('phones','laptops','assets','all'));

    }


    public function product($id)
    {
            $products = Product::where('id',$id)->get();
                return view('product',compact('products'));
    }


    public function category($slug)
    {
        if (Category::where('slug',$slug)->exists()) {
       $category = Category::where('slug',$slug)->first();
       $products = Product::where('category_id',$category->id)->get();
         }
             else {
                return redirect('/')->with('Status','slug does not exists');
             }

        return view('category',compact('category','products'));
    }


}
