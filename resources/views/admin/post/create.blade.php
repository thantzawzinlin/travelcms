@extends('layouts.app')


@section('content')


 <div class="card card-default">
      
     <div class="card-header">
        Create Post
     </div>
     
    @include('includes/message/errors')
     <div class="card-body">
       
         <form action="{{route('post.store')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        @trix(\App\Post::class, 'content')
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
              <select name="category_id"  class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}"> {{  $category->name  }}</option>
                @endforeach

              </select>
          </div>
          <div class="form-group ">
               <label for="tag">Tags</label>
               @foreach ($tags as $tag)

                    <div class="checkbox">                       
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tags}}</label>
                    </div>
                @endforeach
                
               
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

@section('style')


    

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">

@stop
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
  $('#content').summernote();
});
</script>

@stop




    
    