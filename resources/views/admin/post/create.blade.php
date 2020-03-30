@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Create Post
     </div>
     @if (count($categories)==0)
        <div class="alert alert-success">
          return alert('You have no category .Create one First!');
        </div>
        @endif
    @include('includes/message/errors')
     <div class="card-body">
       
         <form action="{{route('post.store')}}" method="POST" enctype='multipart/form-data'>
        @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="post-slug">
          </div>
          
          <div class="form-group">
              <label for="picture">Picture</label>
              <input type="file" name="picture" class="form-control">
          </div>
          <div class="form-group">
              <label for="cat_id">Category_id</label>
              <select name="cat_id"  class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}"> {{  $category->name  }}</option>
                @endforeach

              </select>
          </div>
           <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
             
          </div>
         
         
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">Create Post</button>
          </div>
        </form>
     </div>
 </div>





@stop