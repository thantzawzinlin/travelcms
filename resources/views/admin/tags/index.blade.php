@extends('layouts.app')


@section('content')


<div class="card card-default">
    <div class="card-header">
        All Tag
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
             <th>Tag Name</th>
             <th>Edit</th>
             <th>Delete</th> 
            </thead>
            <tbody>     
                @if ($tags->count()>0)
                     @foreach ($tags as $tag)
                    <tr>
                    
                            <td>{{$tag->tags}}</td>
                            <td><a href="{{route('tag.edit',['id'=>$tag->id])}}">Edit</a></td>
                            <td><a href="{{route('tag.delete',['id'=>$tag->id])}}">Delete</a></td>
                        
                    </tr>
                @endforeach
                @else
                    <tr  class="bg-warning ">
                        <td class="text-center">You have no  Tag for now</td>
                    </tr>
                @endif               
            </tbody>
        </table>
    </div>
</div>





@stop