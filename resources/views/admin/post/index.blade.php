@extends('layouts.app')


@section('content')


<div class="card card-default">
    <div class="card-header">
        All Post
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
             <th>Image</th>
             <th>Post Title</th>
             <th>Post Content</th>
             <th>Edit</th>
             <th>Delete</th> 
            </thead>
            <tbody>     
                 @foreach ($posts as $post)
                    <tr>
                            <td><img src="{{asset($post->picture)}}" alt="{{$post->title}}" width="90px" height="90px"></td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            
                            <td><a href="{{route('post.edit',['id'=>$post->id])}}">Edit</a></td>
                            <td><a href="{{route('post.delete',['id'=>$post->id])}}">Delete</a></td>
                        
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>





@stop