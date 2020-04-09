@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Edit User Profile
     </div>
    @include('includes/message/errors')
     <div class="card-body">
        
         <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" name="name" value="{{$user->name}}" class="form-control">
          </div>
          <div class="form-group">
              <label for="name">Email</label>
              <input type="email" name="email" value="{{$user->email}}" class="form-control">
          </div>
          <div class="form-group">
              <label for="password">New Password</label>
              <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
              <label for="avartar">Avartar</label>
              <input type="file" name="avartar"  class="form-control">
              
          </div>
          <div class="form-group">
              <label for="facebook">facebook</label>
              <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
          </div>
          <div class="form-group">
              <label for="youtube">youtube</label>
              <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
          </div>
          <div class="form-group">
              <label for="about">About</label>
              <textarea name="about" id="" cols="30" rows="10" value="{{$user->profile->about}}" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">Create User</button>
          </div>
        </form>
     </div>
 </div>





@stop