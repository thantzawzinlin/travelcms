@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Create Setting
     </div>
    @include('includes/message/errors')
     <div class="card-body">
        
         <form action="{{route('setting.update')}}" method="POST">
        @csrf
          <div class="form-group">
              <label for="name">Site Name</label>
              <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
          </div>
          <div class="form-group">
              <label for="Phone">Phone</label>
              <input type="text" name="phone"  value="{{ $settings->phone }}" class="form-control">
          </div>
          <div class="form-group">
              <label for="about">About</label>
              <input type="text" name="about"  value="{{ $settings->about }}" class="form-control">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">Create Setting</button>
          </div>
        </form>
     </div>
 </div>





@stop