@extends('layouts.app')
@section('content')
    <div class="card container"style="margin-top:80px;">

        <div class="card-header bg-primary text-white row">
            <div class="col-md-7">
                User Profile
            </div>
             <div class="col-md-5 float-end">
                 <nav class="breadcrumb">
                     <a class="breadcrumb-item" href="{{ url('user-dashboard') }}">Orders</a>
                     <a class="breadcrumb-item" href="{{url('view-profile')}}">Update Profile</a>
                     <a class="breadcrumb-item" href="#">Back</a>
                 </nav>
             </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>order Date</th>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as  $order )


                        <tr>
                            <td scope="row">{{date('d-m-Y',strtotime($order->Created_at))}}</td>
                            <td>{{$order->tracking_number}}</td>
                            <td>${{$order->total_price}}</td>
                            <td>{{$order->status=='0' ?  'pending':'complete'}}</td>

                            <td>
                                <a href="{{url('view-order/'.$order->id)}}" class="btn btn-primary py-0 text-white  btn-sm"role="button">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>



        </div>
        </div>



@endsection
