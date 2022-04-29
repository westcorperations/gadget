@extends('layouts.admin')
@section('content')
<div class="card  pb-8 pt-5 pt-md-8">
    <header class="card-header row bg-white text-white">
        <h4 class="col-md-9">Order History</h4>  
        <a name="" id="" class="btn btn-primary btn-sm py-o col-md-3 float-end" href="{{url('orders')}}" role="button">New  Orders</a>
    </header>
  <div class="card-body">
    
   <table class="table table-bordered table-striped table-inverse table-responsive">
       <thead class="thead-inverse">
           <tr>
            <th>order Date</th>
            <th>Tracking Number</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
           </tr>
           </thead>
           <tbody> 
               @foreach ($orders as $order)
                   
              
               <tr>
                   <td scope="row">{{date('d-m-Y',strtotime($order->Created_at))}}</td>
                   <td>{{$order->tracking_number}}</td>
                   <td>${{$order->total_price}}</td>
                   <td>{{$order->status=='0' ?  'pending':'complete'}}</td>
                   <td> <a href="{{url('view-order/'.$order->id)}}" class="btn btn-primary py-0 text-white  btn-sm"role="button">View</a>
</td>
               </tr>
               @endforeach
           </tbody>
   </table>
   
  </div>
</div>
@endsection