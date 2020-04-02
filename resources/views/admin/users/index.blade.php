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
             <th>Name</th>             
             <th>Permission</th>
             <th>Delete</th> 
            </thead>
            <tbody>  
                   
                @if ($users->count()>0)
                 @foreach ($users as $user)
                    <tr>                          
                    <td><img src="{{asset($user->profile1->avartar)}}" alt="" width="50px" height="50px" style="border-radius:50%;"></td>
                    <td>{{$user->name}}</td>
                    <td>Permissions</td>
                    <td>Delete</td>
                    </tr>
                @endforeach
                @else
                    <tr  class="bg-warning ">
                        <td class="text-center">You have no user for now</td>
                    </tr>
                    
                @endif
               
            </tbody>
        </table>
    </div>
</div>





@stop