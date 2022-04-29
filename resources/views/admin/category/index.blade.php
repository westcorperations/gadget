@extends('layouts.admin')
@section('content')
    <div class="card pb-8 pt-5 pt-md-8">
        <header class="card-header">
            <h4>Category</h4>
        </header>
        <div class="card-body border ">

            <table class="table  table-responsive  table-striped table-sm  bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ asset('assets/uploads/category/' . $item->image) }}" alt="mage"
                                    class="w-25"></td>
                            <td> <a href="{{ url('edit/' . $item->id) }}"> <button class=" btn-success">Edit</button></a>
                            </td>
                            <form action="{{ url('delete-category/' . $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <td> <button class=" btn-danger">Delete</button> </a></td>
                            </form>

                        </tr>
                    @endforeach


                </tbody>

            </table>

        </div>

    </div>
@endsection
