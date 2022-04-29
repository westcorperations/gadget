@extends('layouts.admin')
@section('content')

    <div class="card ">

        <header class="card-header bg-white text-primary row">
            <span class="col-md-8">
                view order
            </span>
           
            <span class="col-md-4 float-end">
                <a  class="btn btn-primary" href="{{url('orders')}}" role="button">Back</a>
            </span>
           
          
        </header>
         <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"> 
                    <h5>shipping details</h5> 
                    <hr>  

                    <div class="row">

                        <label for="" class="col-md-5">Firstname:</label>
                        <div class="col-md-7">{{ $orders->firstname }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Lastname:</label>
                        <div class="col-md-7">{{ $orders->lastname }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Email:</label>
                        <div class="col-md-7">{{ $orders->email }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">City:</label>
                        <div class="col-md-7">{{ $orders->city }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">State:</label>
                        <div class="col-md-7">{{ $orders->state }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Country:</label>
                        <div class="col-md-7">{{ $orders->country }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Contact:</label>
                        <div class="col-md-7">{{ $orders->phone }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Address1:</label>
                        <div class="col-md-7">{{ $orders->address1 }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Address2:</label>
                        <div class="col-md-7">{{ $orders->address2 }}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Zipcode:</label>
                        <div class="col-md-7">{{ $orders->pincode }}</div>
                    </div>



                </div>
           
            <div class="col-md-6"> 
                <h5>order details</h5> 
                <hr> 
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
                                <td>${{ $order->price }}</td>
                                <td>
                                    <img src="{{asset('assets/uploads/product/'.$order->product->image)}}"
                                     alt="product image" class="w-25">
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5><span class="float-end"> Grand Total: ${{$orders->total_price}}</span></h5>
                <form action="{{url('deliver-order/'.$orders->id )}}" method="post"> 
                    @method('PUT') 
                    @csrf
                     <div class="mb-3 col-md-6">
                         <label for="" class="form-label">Delivery Status</label>
                         <select class="form-select" name="status">
                             <option {{$orders->status=='0'?'selected':''}} value="0">pending</option>
                             <option {{$orders->status=='1'?'selected':''}}value="1">complete</option>
                             
                            </select>  
                            <button type="submit"class="btn btn-primary btn-sm mt-3 col-md-6 py-0">Update</button>

                        </div>
                </form>

            </div>
            </div>
       
@endsection