@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-md-6">
		<h1>Edit Category</h1>
		<!--<form action="/posts" method="post">-->
		{!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}
		  <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('name', 'Category Name:', ['for' => 'name']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name']) !!}
		    @if($errors->has('name'))
		    	{{$errors->first('name')}}
		    @endif
		  </div>
		  {!! Form::submit('Update Category', ['class' => 'btn btn-primary col-md-6', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}

		{!! Form::model($category, ['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
			{!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-md-6', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}
	</div>
</div>
@stop