@extends('layouts.app')
@section('content')
<div class="category-header mt-6">
    <h2 class="text-center">{{$category->name}}</h2>
  </div>   
  
    <div class="category">

  @foreach ($products as $product)
  <div class="card ">
   
      
    
    <div class="card-header ">
      <span class="product-name fs-6 fw-bolder text-justify">{{$product->name}}</span><br>
      <span class="product-brand fs-6 fw-bold">Brand</span>
    </div>

    <div class="card-img">
      <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="">
    </div>
    <div class="card-footer">
      <div class="product-price">
        <span class="fs-6 fw-bolder">${{$product->selling_price}}</span> <br>
        <span class=" fw-bolder "> <small>Price</small> </span>
      </div>
      <div class="product-icon">
        <button class="btn  btn-outline-dark "> <a href="#">
            <img src="/images/shopping-cart.png" alt=""> </a></button>
      </div>
    </div>
  </div>
  @endforeach
</div>
  
@endsection