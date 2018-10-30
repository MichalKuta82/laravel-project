@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
  <div class="alert alert-danger text-center">{{session('deleted_user')}}</div>
@endif
@if(Session::has('updated_user'))
  <div class="alert alert-success text-center">{{session('updated_user')}}</div>
@endif
@if(Session::has('created_user'))
  <div class="alert alert-success text-center">{{session('created_user')}}</div>
@endif

<h1>Users</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
  	@if($users)
	  	@foreach($users as $user)
		    <tr>
		      <td>{{$user->id}}</td>
          <td><img height="50" src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/200'}}"></td>
		      <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
		      <td>{{$user->email}}</td>
		      <td>{{$user->role->name}}</td>
		      <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
		      <td>{{$user->created_at->toDayDateTimeString()}}</td>
		      <td>{{$user->updated_at->toDayDateTimeString()}}</td>
		    </tr>
	    @endforeach
    @endif
  </tbody>
</table>
{{ $users->links() }}  
@stop