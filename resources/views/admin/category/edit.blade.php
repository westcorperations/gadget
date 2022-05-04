@extends('layouts.admin')
@section('content')
<div class="card pb-8 pt-5 pt-md-8">
    <div class="card-header">

        <h4>Edit Category</h4>

    </div>
    <div class="card-body border ">
        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6  col-6 mb-3">
                    <label for=""> Name </label>
                    <input type="text" name="name" class="form-control" required value="{{$category->name}}">
                </div>

                <div class="col-md-6 col-6 mb-3">
                    <label for=""> Slug </label>
                    <input type="text" name="slug" class="form-control" required value="{{$category->description}}">
                </div>
            </div>

            <div class="row">
                @if ($category->image)
                <img src="{{url('assets/uploads/category/'.$category->image )}}" alt="" class="w-25">
                @endif
                <div class="col-md-12 col-12 mb-3">
                    <label for="">image</label>
                    <input type="file" name="image" required value="{{$category->image}}" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" required class="form-control">{{$category->description}}</textarea>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6  mb-3 ">
                    <label for="" class="">Status</label>
                    <input type="checkbox" {{$category->status=='1'?'checked':''}} name="status" class="">
                </div>

                <div class="col-md-6  mb-3  ">
                    <label for="">popular</label>
                    <input type="checkbox" {{$category->popular=='1'?'checked':''}} name="popular" class="">
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for=""> Meta-Title </label>
                    <textarea name="meta_title" rows="3" required class="form-control">{{$category->meta_title}}</textarea>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for=""> Meta-Description </label>
                    <textarea name="meta_descrip" rows="3" required class="form-control">{{$category->meta_descrip}}</textarea>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for=""> Meta-Keywords </label>
                    <textarea name="meta_keyword" rows="3" required class="form-control">{{$category->meta_keyword}}</textarea>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
@endsection
