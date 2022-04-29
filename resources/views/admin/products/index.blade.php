@extends('layouts.admin')
@section('content')
    <div class="card pb-8 pt-5 pt-md-8">
        <header class="card-header">
            <h4>Products</h4>
        </header>
        <div class="card-body border ">
           
    <table class="table table-responsive table-striped table-sm bordered">
 <thead>
     <tr>
        <th>Id</th>
        <th>name</th>
<th>category</th>
        <th>description</th>
        <th>selling price</th>
        <th>cost price</th>
        <th>quantity</th>
        <th>tax</th>
        <th>status</th>
        <th>trending</th>
        <th>image</th>
       
        <th>Action</th>
   </tr>     
  </thead>  
  <tbody> 
       @foreach ($product as $item)
          
     
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->category->name}}</td>

        <td>{{$item->description}}</td>
        <td>{{$item->selling_price}}</td>
        <td>{{$item->original_price}}</td>
        <td>{{$item->quantity}}</td>
        <td>{{$item->tax}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->trending}}</td>


        <td><img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="image"class="w-50"></td>
        <td> <a href="{{url('edit-product/'.$item->id)}}"> <button class=" btn-success">Edit</button></a></td>
        <form action="{{url('delete-product/'.$item->id)}}" method="post">
          @csrf
          @method('DELETE')
        <td>  <button class= " btn-danger">Delete</button> </a></td></form>

    </tr>
   @endforeach


     

</tbody>    

    </table>

        </div>

    </div>
@endsection