@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-6">	
		<h1>Create Post</h1>
		
	    <!--<form action="/posts" method="post">-->
		{!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
		  <div class="form-group {{$errors->has('title') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('title', 'Title:', ['for' => 'title']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'name' => 'title']) !!}
		    @if($errors->has('title'))
		    	{{$errors->first('title')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('category_id') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('category_id', 'Category:', ['for' => 'category_id']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::select('category_id', ['' => 'Chose Category'] + $categories, null, ['class' => 'form-control', 'placeholder' => 'Category', 'name' => 'category_id']) !!}
		    @if($errors->has('category_id'))
		    	{{$errors->first('category_id')}}
		    @endif
		  </div>
		  <div class="form-group">
		  	<div class="form-group {{$errors->has('photo_id') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('photo_id', 'Photo:', ['for' => 'photo_id']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::file('photo_id', null, ['class' => 'form-control', 'placeholder' => 'Photo', 'name' => 'photo_id']) !!}
		    @if($errors->has('photo_id'))
		    	{{$errors->first('photo_id')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('body') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('body', 'Body:', ['for' => 'body']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Body', 'name' => 'body']) !!}
		    @if($errors->has('body'))
		    	{{$errors->first('body')}}
		    @endif
		  </div>
		  {!! Form::submit('Create Post', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}
	</div>
</div>

@stop