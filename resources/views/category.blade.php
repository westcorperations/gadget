@extends('layouts.app')
@section('content')
<div class="category-header mt-6">
    <h2 class="text-center">{{$category->name}}</h2>
  </div>

    <div class="category">

  @foreach ($products as $product)
  <div class="category_data">
  <div class="card ">


    <a href="{{ url('product/' . $product->id) }}">
    <div class="card-header ">
      <span class="product-name fs-6 fw-bolder text-justify">{{$product->name}}</span><br>
      <span class="product-brand fs-6 fw-bold">Brand</span>
    </div>

    <div class="card-img">
      <img src="{{url('storage/uploads/product/'.$product->image)}}" alt="">
    </div>
    <div class="card-footer">
      <div class="product-price">
        <span class="fs-6 fw-bolder">${{$product->selling_price}}</span> <br>
        <span class=" fw-bolder "> <small>Price</small> </span>
      </div>
      <input type="hidden" value="{{ $product->id }}" class="category_id">
      </a>
      <div class="product-icon">
        <button class="btn btn-outline-primary  categoryaddtocart  ">
            <img src="/images/shopping-cart.png" alt="image"> </button>
    </div>

    </div>
  </div>
  </div>
  @endforeach
</div>

@endsection
