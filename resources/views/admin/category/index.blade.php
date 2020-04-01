@extends('layouts.app')


@section('content')


<div class="card card-default">
    <div class="card-header">
        All Category
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
             <th>Category Name</th>
             <th>Edit</th>
             <th>Delete</th> 
            </thead>
            <tbody>     
                @if ($categories->count()>0)
                     @foreach ($categories as $category)
                    <tr>
                    
                            <td>{{$category->name}}</td>
                            <td><a href="{{route('category.edit',['id'=>$category->id])}}">Edit</a></td>
                            <td><a href="{{route('category.delete',['id'=>$category->id])}}">Delete</a></td>
                        
                    </tr>
                @endforeach
                @else
                    <tr  class="bg-warning ">
                        <td class="text-center">You have no  category for now</td>
                    </tr>
                @endif               
            </tbody>
        </table>
    </div>
</div>





@stop