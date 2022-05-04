@extends('layouts.admin')
@section('content')
<div class="card pb-8 pt-5 pt-md-8">
    <div class="card-header">

    <h4>Edit Product</h4>

    </div>
    <div class="card-body border ">
        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <label for="">  Name  </label>
                        <input type="text" name="name" required value="{{$product->name}}" class="form-control">
                </div>
              </div>
            <div class="row">
                <div class="col-md-6 col-6 mb-3">
                   <select  class="form-select form-control" name="category_id" aria-label="Default select example">
                       <option value="">Select a category </option>
                       @foreach ( $category as $item )


                       <option value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach

                   </select>
                </div>
            </div>



            <div class="row">

                <div class="col-md-3 col-3 mb-3">
                    <label for="">selling price </label>
                        <input type="text" name="selling_price" required value="{{$product->selling_price}}" class="form-control">
                </div>
                <div class="col-md-3 col-3 mb-3">
                    <label for=""> cost price </label>
                        <input type="text" name="cost_price"required value="{{$product->original_price}}"  class="form-control">
                </div>
                <div class="col-md-3 col-3 mb-3">
                    <label for=""> Tax </label>
                        <input type="text" name="tax" required value="{{$product->tax}}" class="form-control">
                </div>
                <div class="col-md-3 col-3 mb-3">
                    <label for=""> Quantity</label>
                        <input type="text" name="quantity" required value="{{$product->quantity}}" class="form-control">
                </div>
            </div>

            <div class="row">
                @if ($product->image)
                <img src="{{url('assets/uploads/product/'.$product->image )}}" alt="" class="w-25">
                @endif
                <div class="col-md-12 col-12 mb-3">
                    <label for="">image</label>
                    <input type="file" name="image" required value="{{$product->image}}}" rows="3" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" required class="form-control">{{$product->description}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3" aria-required="" class="form-control">{{$product->small_description}}</textarea>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6  mb-3 ">
                    <label for="" class="">Status</label>
                    <input type="checkbox" {{$product->status=='1'?'checked':''}} name="status"  class="">
                 </div>

                <div class="col-md-6  mb-3  ">
                    <label for="">Trending</label>
                    <input type="checkbox" {{$product->trending=='1'?'checked':''}} name="trending"  class="">
                 </div>
            </div>

            <div class="row">

                 <div class="col-md-12 mb-3">
                    <label for="">  Meta-Title  </label>
                        <textarea  name="meta_title" rows="3" required class="form-control">{{$product->meta_title}}</textarea>
                </div>
            </div>
            <div class="row">

                 <div class="col-md-12 mb-3">
                    <label for="">  Meta-Description  </label>
                        <textarea  name="meta_description" rows="3" required class="form-control">{{$product->meta_description}}</textarea>
                </div>
            </div>
            <div class="row">

                 <div class="col-md-12 mb-3">
                    <label for="">  Meta-Keywords  </label>
                        <textarea  name="meta_keyword" rows="3" required class="form-control">{{$product->meta_keyword}}</textarea>
                </div>
            </div>

                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
@endsection
