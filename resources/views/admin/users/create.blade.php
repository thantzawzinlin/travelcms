@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Create User
     </div>
    @include('includes/message/errors')
     <div class="card-body">
        
         <form action="{{route('user.store')}}" method="POST">
        @csrf
          <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
              <label for="name">Email</label>
              <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">Create User</button>
          </div>
        </form>
     </div>
 </div>





@stop