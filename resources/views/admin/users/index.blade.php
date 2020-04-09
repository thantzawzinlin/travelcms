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
                    <td><img src="{{asset($user->profile->avartar)}}" alt="" width="50px" height="50px" style="border-radius:50%;"></td>
                    <td>{{$user->name}}</td>
                    <td>
                        @if($user->admin)
                        <a href="{{route('user.notadmin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove Permission</a>
                        @else
                            <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make Admin</a>
                        @endif
                    </td>
                    @if(Auth::id()!==$user->id)
                    <td>
                    <a href="{{route('user.delete',['id'=>$user->id]) }}" class="btn btn-danger btn-sm"> Delete</a>
                    </td>
                    @endif
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