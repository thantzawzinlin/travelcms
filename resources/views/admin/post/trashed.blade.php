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
            
             <th>Edit</th>
             <th>Restore</th> 
             <th>Delete permently</th>
            </thead>
            <tbody>    
                @if($posts->count()>0) 
                    @foreach ($posts as $post)
                    <tr>
                          
                        <td><img src="{{asset($post->picture)}}" alt="{{$post->title}}" width="90px" height="90px"></td>
                            <td>{{$post->title}}</td>
                            
                            
                            <td><a href="{{route('post.edit',['id'=>$post->id])}}">Edit</a></td>
                            <td><a href="{{route('post.restore',['id'=>$post->id])}}">Restore</a></td>
                            <td><a href="{{route('post.kill',['id'=>$post->id])}}">Delete</a></td>   
                            
                            
                        
                    </tr>
                @endforeach

                @else
                    <tr  class="bg-warning ">
                        <td class="text-center">You have no trashed posts for now</td>
                    </tr>
                   

                @endif
                    
               
            </tbody>
        </table>
    </div>
</div>





@stop