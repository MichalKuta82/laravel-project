@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-md-3">
		<img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/200'}}" class="img-thumbnail">
	</div>
    <div class="col-md-9">	
		<h1>Edit User</h1>
		
	    <!--<form action="/posts" method="post">-->
		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
		  <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('name', 'Name:', ['for' => 'name']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name']) !!}
		    @if($errors->has('name'))
		    	{{$errors->first('name')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('email', 'Email:', ['for' => 'email']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'name' => 'email']) !!}
		    @if($errors->has('email'))
		    	{{$errors->first('email')}}
		    @endif
		  </div>
		  <div class="form-group">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('role_id', 'Role Id:', ['for' => 'role_id']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'name' => 'role_id']) !!}
		  </div>
		  <div class="form-group {{$errors->has('is_active') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('is_active', 'Status:', ['for' => 'status']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, ['class' => 'form-control']) !!}
		    @if($errors->has('is_active'))
		    	{{$errors->first('is_active')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('photo_id') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('photo_id', 'Photo:', ['for' => 'photo_id']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
		    @if($errors->has('photo_id'))
		    	{{$errors->first('photo_id')}}
		    @endif
		  </div>
		  <div class="form-group">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('password', 'Password:', ['for' => 'password']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'name' => 'password']) !!}
		  </div>
		  <div class="form-group">
		  	{!! Form::submit('Update User', ['class' => 'btn btn-primary  col-md-6', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		  </div>
		{!! Form::close() !!}

		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
			{!! Form::submit('Delete User', ['class' => 'btn btn-danger col-md-6', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}
	</div>
</div>
@stop