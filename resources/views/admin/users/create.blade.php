@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-6">	
		<h1>Create User</h1>
		
	    <!--<form action="/posts" method="post">-->
		{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
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
		    {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class' => 'form-control', 'name' => 'role_id']) !!}
		  </div>
		  <div class="form-group {{$errors->has('is_active') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('is_active', 'Status:', ['for' => 'status']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], 0, ['class' => 'form-control']) !!}
		    @if($errors->has('is_active'))
		    	{{$errors->first('is_active')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('file') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('file', 'File:', ['for' => 'file']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::file('file', null, ['class' => 'form-control']) !!}
		    @if($errors->has('file'))
		    	{{$errors->first('file')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('password') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('password', 'Password:', ['for' => 'password']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'name' => 'password']) !!}
		    @if($errors->has('password'))
		    	{{$errors->first('password')}}
		    @endif
		  </div>
		  {!! Form::submit('Create User', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}
	</div>
</div>
@stop