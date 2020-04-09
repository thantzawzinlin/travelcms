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
             {{-- <th>Post Content</th> --}}
             <th>Edit</th>
             <th>Trashed</th> 
            </thead>
            <tbody>  
                   
                @if ($posts->count()>0)
                 @foreach ($posts as $post)
                    <tr>                          
                        <td><img src="{{asset($post->picture)}}" alt="{{$post->title}}" width="90px" height="90px"></td>
                            <td>{{$post->title}}</td>
                            {{-- <td>{{$post->content}}</td> --}}
                            
                            <td><a href="{{route('post.edit',['id'=>$post->id])}}">Edit</a></td>
                            <td><a href="{{route('post.delete',['id'=>$post->id])}}">delete</a></td>   
                    </tr>
                @endforeach
                @else
                    <tr  class="bg-warning ">
                        <td class="text-center">You have no  posts for now</td>
                    </tr>
                    
                @endif
               
            </tbody>
        </table>
    </div>
</div>





@stop