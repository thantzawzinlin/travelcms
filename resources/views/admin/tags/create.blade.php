@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Create Tag
     </div>
    @include('includes/message/errors')
     <div class="card-body">
        
         <form action="{{route('tag.store')}}" method="POST">
        @csrf
          <div class="form-group">
              <label for="name">Tag Name</label>
              <input type="text" name="tags" class="form-control">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">Create Tag</button>
          </div>
        </form>
     </div>
 </div>





@stop