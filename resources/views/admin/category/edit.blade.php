@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Edit Category
     </div>
    @include('includes/message/errors')
     <div class="card-body">
        
         <form action="{{route('category.update',['id'=>$categories->id])}}" method="POST">
        @csrf
          <div class="form-group">
              <label for="name">Category Name</label>
          <input type="text" name="name" value="{{$categories->name}}" class="form-control">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">Update Category</button>
          </div>
        </form>
     </div>
 </div>





@stop