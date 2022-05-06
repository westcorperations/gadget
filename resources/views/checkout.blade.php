@extends('layouts.app')


@section('content')
@php
                                    $subtotal = 0;

                                @endphp
    <div class="container " style="padding-top:80px;">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">

                            <form action="{{url('place-order')}}" method="POST">
                                 {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">First Name</label>
                                        <input type="text" name="firstname" id="" value="{{Auth::user()->name}}"
                                         class="form-control  firstname" required>
                                        <small class="text-danger"id="firstname_error"></small>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label ">Last Name</label>
                                            <input type="text" class="form-control lastname"
                                        name="lastname" value="{{Auth::user()->lastname}}" id="" placeholder=""required>
                                            <small class="text-danger"id="lastname_error"></small>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label ">Email Address</label>
                                            <input type="Email" class="form-control email" name="email" id=""
                                                 placeholder=""value="{{Auth::user()->email}}"required>
                                                <small class="text-danger"id="email_error"></small>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control phone" name="phone" id=""
                                                aria-describedby="helpId" placeholder=""value="{{Auth::user()->phone}}"required>
                                                <small class="text-danger"id="phone_error"></small>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Address</label>
                                            <input type="text" class="form-control address1" name="address1" id=""
                                                aria-describedby="helpId" placeholder=""value="{{Auth::user()->address}}"required>
                                                <small class="text-danger"id="address1_error"></small>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">2nd Address</label>
                                            <input type="text" class="form-control address2" name="address2" id=""
                                                aria-describedby="helpId" placeholder=""value="{{Auth::user()->address2}}"required>
                                                <small class="text-danger"id="address2_error"></small>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">City</label>
                                            <input type="text" class="form-control city" name="city" id=""
                                                aria-describedby="helpId" placeholder=""value="{{Auth::user()->city}}"required>
                                                <small class="text-danger"id="city_error"></small>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">State</label>
                                            <input type="text" class="form-control state" name="state" id=""
                                                aria-describedby="helpId" placeholder=""value="{{Auth::user()->state}}"required>
                                                <small class="text-danger"id="state_error"></small>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Country</label>
                                            <input type="text" class="form-control country" name="country" id=""
                                                aria-describedby="helpId" placeholder=""value="{{Auth::user()->country}}"required>
                                                <small class="text-danger"id="country_error"></small>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Zipcode</label>
                                            <input type="text" class="form-control pincode" name="pincode" id=""
                                                aria-describedby="helpId" value="{{Auth::user()->pincode}}" placeholder=""required>
                                                <small class="text-danger"id="zipcode_error"></small>

                                        </div>
                                    </div>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-borderd  table-inverse table-responsive">
                            <thead class="thead-default">
                                <tr>
                                    <th>Name</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cartitems as $item)
                                    @php
                                        $subtotal += $item->product->selling_price * $item->product_qty;
                                    @endphp
                                    <tr>
                                        <td scope="row">{{ $item->product->name }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td> &#8358 {{ $item->product->selling_price }}</td>
                                        <td> &#8358 {{ $item->product->selling_price * $item->product_qty }}</td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
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

                    </div>
                    <div class="d-grid gap-2 p-3">
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" class="btn btn-success ">PlaceOrder|COD</button>
                        <button  type="button"class="btn btn-primary   paystackbtn">Pay With Paystack</button>


                          </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="https://js.paystack.co/v1/inline.js"></script>

@endsection
