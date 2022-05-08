<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
       return view('admin.category.index',compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public  function insert(Request $request)
    {
       $category = new Category();
       if ($request->hasFile('image')) {
           $file = $request->file('image');

           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext ;
           $file->move(public_path('/storage/uploads/category/'), $filename);
           $category->image = $filename;

       }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status')== True ? '1':'0';
        $category->popular = $request->input('popular')== True ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->save();
        return redirect('/dashboard')->with(' Status', 'Category Added Successfully');


    }
public function edit($id)
{
    $category = Category::find($id);
   return view('admin.category.edit', compact('category'));

}

public function update( Request $request, $id)
{
   $category = Category::find($id);
if ($request->hasFile('image')) {
    $path = public_path('/storage/uploads/category/').$category->image;
    if (File::exists($path)) {
       File::delete($path);
    }
    $file = $request->file('image');
    $ext = $file->getClientOriginalExtension();
    $filename = time().'.'.$ext ;
    $file->move(public_path('/storage/uploads/category/'), $filename);
    $category->image = $filename;

}
$category->name = $request->input('name');
$category->slug = $request->input('slug');
$category->description = $request->input('description');
$category->status = $request->input('status')== True ? '1':'0';
$category->popular = $request->input('popular')== True ? '1':'0';
$category->meta_title = $request->input('meta_title');
$category->meta_descrip = $request->input('meta_descrip');
$category->meta_keyword = $request->input('meta_keyword');
$category->update();
return redirect('/dashboard')->with('Status', 'Category Updated Successfully');
}


public function delete($id)
{
    $category = Category::find($id);
    if ($category->image) {
    $path = public_path('/storage/uploads/category/').$category->image;

       if (File::exists($path)) {
       File::delete($path);

       }
    }
       $category->delete();
       return redirect('categories')->with('Status', 'Category Deleted Successfully');


}

}
