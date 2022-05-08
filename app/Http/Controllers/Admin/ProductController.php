<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
       return view('admin.products.index',compact('product'));
    }
    public function create()
    {
        $category = Category::all();
       return view('admin.products.add',compact('category'));
    }
    public function insert(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext ;
            $file->move(public_path('/storage/uploads/product/'), $filename);
            $product->image = $filename;
         $product->name = $request->input('name');
         $product->category_id = $request->input('category_id');

         $product->small_description = $request->input('small_description');
         $product->description = $request->input('description');
         $product->original_price = $request->input('cost_price');
         $product->selling_price = $request->input('selling_price');
         $product->quantity = $request->input('quantity');

         $product->status = $request->input('status')== True ? '1':'0';
         $product->trending = $request->input('trending')== True ? '1':'0';
         $product->meta_title = $request->input('meta_title');
         $product->meta_description = $request->input('meta_description');
         $product->meta_keyword = $request->input('meta_keyword');
         $product->save();
         return redirect('products')->with('Status', 'Product Added Successfully');


     }
    }
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit',compact('product','category'));
    }

public function update( Request $request, $id)
{
    $product = Product::find($id);
if ($request->hasFile('image')) {
    $path = public_path('/storage/uploads/product/').$product->image;
    if (File::exists($path)) {
       File::delete($path);
    }
    $file = $request->file('image');
    $ext = $file->getClientOriginalExtension();
    $filename = time().'.'.$ext ;
    $file->move(public_path('/storage/uploads/product/'), $filename);
    $product->image = $filename;

}
$product->name = $request->input('name');
$product->category_id = $request->input('category_id');
$product->small_description = $request->input('small_description');
$product->description = $request->input('description');
$product->original_price = $request->input('cost_price');
$product->selling_price = $request->input('selling_price');
$product->quantity = $request->input('quantity');
$product->tax = $request->input('tax');
$product->status = $request->input('status')== True ? '1':'0';
$product->trending = $request->input('trending')== True ? '1':'0';
$product->meta_title = $request->input('meta_title');
$product->meta_description = $request->input('meta_description');
$product->meta_keyword = $request->input('meta_keyword');
$product->update();
return redirect('/products')->with('Status', 'Product updated Successfully');


}
public function delete($id)
{
    $product = Product::find($id);
    if ($product->image) {
        $path = public_path('/storage/uploads/category/').$product->image;


       if (File::exists($path)) {
       File::delete($path);

       }
    }
       $product->delete();
       return redirect('products')->with('Status', 'Product Deleted Successfully');

}
}
