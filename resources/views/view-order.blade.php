@extends('layouts.app')
@section('content')
    <div class="card container" style="margin-top:80px;">

        <div class="card-header bg-primary text-white row">
            <div class="col-md-8">
                view order
            </div>
            <div class="col-md-4 float-end">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ url('user-dashboard') }}">Orders</a>
                    <a class="breadcrumb-item" href="{{ url('user-dashboard') }}">Back</a>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="row">

                        <label for="" class="col-md-3">Firstname:</label>
                        <div class="col-md-7">{{ $orders->firstname }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Lastname:</label>
                        <div class="col-md-7">{{ $orders->lastname }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Email:</label>
                        <div class="col-md-7">{{ $orders->email }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">City:</label>
                        <div class="col-md-7">{{ $orders->city }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">State:</label>
                        <div class="col-md-7">{{ $orders->state }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Country:</label>
                        <div class="col-md-7">{{ $orders->country }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Contact:</label>
                        <div class="col-md-7">{{ $orders->phone }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Address1:</label>
                        <div class="col-md-7">{{ $orders->address1 }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Address2:</label>
                        <div class="col-md-7">{{ $orders->address2 }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3">Zipcode:</label>
                        <div class="col-md-7">{{ $orders->pincode }}</div>
                    </div>



                </div>

            <div class="col-md-6">

                <table class="table table-striped table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->order_items as $order)
                            <tr>
                                <td scope="row">{{ $order->product->name }}</td>
                                <td>{{ $order->Qty }}</td>
                                <td>&#8358 {{ $order->price }}</td>
                                <td>
                                    <img src="{{asset('assets/uploads/product/'.$order->product->image)}}"
                                     alt="product image" class="w-25">
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5><span class="float-end"> Grand Total: &#8358 {{$orders->total_price}}</span></h5>


            </div>
            </div>
        @endsection
