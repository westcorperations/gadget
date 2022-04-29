@extends('layouts.app')
@section('content')
    @foreach ($products as $product)
        <div class="single-product-c  product_data">




            <div class="img-sec">
                <div class="img-c">
                    <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="product image"
                        class="">
                </div>

            </div>
            <div class="txt-sec">
                <div class="txt-c ">
                    <span class="h4 text-bold"> <b>{{ $product->name }}</b></span>
                    <div class="">
                    </div>
                    <div class="price">
                        <span class="h5 text-primary"> <b>${{ $product->selling_price }}</b> </span>
                    </div>
                    @if ($product->quantity > 0)
                    <span class="badge bg-success">In Stock</span>

                    @else
                    <span class="badge bg-danger">Out Of Stock</span>

                    @endif

                    <div class="quantity">
                        <input type="hidden" value="{{ $product->id }}" class="product_id">
                        <span class="text-secondary">Quantity</span>




                        <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->quantity }}"
                            class="form-control  product_qty">
                    @if ($product->quantity > 0)
                           <button
                                class=" btn btn-primary mt-2 p-2 btnAddCart">Add to cart</button>
@endif
                    </div>
                    <div class="about-product">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="social-share">

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
