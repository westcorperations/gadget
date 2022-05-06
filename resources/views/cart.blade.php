<!DOCTYPE html>
<html lang="en">
<!-- head  -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gadget') }}</title>


    <!-- Styles -->

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/flickity.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> --}}

</head>

<body>
    <div class="">
        <header class="fs-3">
            <div class="row">
                <div class="col-md-6 col-6">
                    <a href="{{ url('/') }}">Home</a>
                </div>
                <div class="col-md-6 col-6 float-right">
                    <a href="{{ url()->previous() }}"> Back</a>
                </div>
            </div>
        </header>



        <div class="shopping-cart">
            @if($cartItems->count()>0)
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="cart-product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>

            @php
                $subtotal = 0;
                // $Tax = 0.05 * $subtotal;
                // $grandTotal = $subtotal + $Tax
            @endphp
            @foreach ($cartItems as $cartItem)
                @php
                    $subtotal += $cartItem->product->selling_price * $cartItem->product_qty;
                @endphp

                    <div class="cart_data">
                        <div class="product ">
                            <div class="product-image">
                                <img src="{{ asset('assets/uploads/product/' . $cartItem->product->image) }}">
                            </div>
                            <div class="product-details">
                                <div class="product-title">{{ $cartItem->product->name }}</div>
                                @if ($cartItem->product->quantity >= $cartItem->product_qty)
                                    <span class="product-description badge bg-success "> in stock </span>
                                @else
                                    <span class="badge bg-danger">out of stock</span>
                                @endif
                            </div>
                            <div class="cart-product-price"> &#8358 {{ $cartItem->product->selling_price }}</div>

                            <input type="hidden" value="{{ $cartItem->product_id }}" class="id_product">

                            <div class="product-quantity">
                                <input type="number"
                                    @if ($cartItem->product->quantity >= $cartItem->product_qty) value="{{ $cartItem->product_qty }}"
                     @else
                     value="0" @endif
                                    min="1" max="{{ $cartItem->product->quantity }}" class="qty_product update-qty">
                            </div>
                            <div class="product-removal">
                                <button class="remove-product btnremovecart">
                                    Remove
                                </button>
                            </div>
                            @if ($cartItem->product->quantity >= $cartItem->product_qty)
                                <div class="product-line-price">
                                    {{ $cartItem->product->selling_price * $cartItem->product_qty }}</div>
                            @else
                                <div class="product-line-price">{{ $cartItem->product->selling_price * 0 }}</div>
                            @endif


        </div>
    </div>
    <hr>
    @endforeach


    <div class="totals">
        <div class="totals-item">
            <label>Subtotal</label>
            <div class="totals-value" id="cart-subtotal">{{ $subtotal }}</div>
        </div>
        <div class="totals-item">
            <label>Tax (5%)</label>
            <div class="totals-value" id="cart-tax">{{ 0.05 * $subtotal }}</div>
        </div>
        {{-- <div class="totals-item">
                <label>Shipping</label>
                <div class="totals-value" id="cart-shipping">.00</div>
            </div> --}}
        <div class="totals-item totals-item-total">
            <label>Grand Total</label>
            <div class="totals-value" id="cart-total">{{ 0.05 * $subtotal + $subtotal }}

            </div>
        </div>
    </div>

    <a href="{{ url('checkout') }}"><button class="checkout">Checkout</button></a>



@else
<div class="emptycart">
 <img src="/images/emptycart.png" class="img-thumbnail w-50 " alt="">
 <h6 class="text-center">The Cart Is Empty!!!</h6>
 <div class="mx-auto center-block emptycartbtn">
 <a name="" id="" class="btn btn-success w-100" href="{{url('/')}}" role="button">Continue Shoping</a>
 </div>
</div>
@endif

    </div>
    </div>

</body>
<script src="{{ asset('frontend/js/jquery.js') }}" defer></script>
<script src="{{ asset('frontend/js/flickity.pkgd.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/index.js') }}" defer></script>

@yield('script')
