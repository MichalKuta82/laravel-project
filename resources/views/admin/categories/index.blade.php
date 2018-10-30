@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_category'))
  <div class="alert alert-danger text-center">{{session('deleted_category')}}</div>
@endif
@if(Session::has('updated_category'))
  <div class="alert alert-success text-center">{{session('updated_category')}}</div>
@endif
@if(Session::has('created_category'))
  <div class="alert alert-success text-center">{{session('created_category')}}</div>
@endif

<div class="row">
	<div class="col-md-6">
		<h1>Create Category</h1>
		<!--<form action="/posts" method="post">-->
		{!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
		  <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('name', 'Category Name:', ['for' => 'name']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name']) !!}
		    @if($errors->has('name'))
		    	{{$errors->first('name')}}
		    @endif
		  </div>
		  {!! Form::submit('Create Category', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}

	</div>

	<div class="col-md-6">
		<h1>Available Categories</h1>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Category Name</th>
		      <th scope="col">Created At</th>
		      <th scope="col">Updated At</th>
		      <th scope="col">Post Count</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($categories as $category)
		    <tr>
		      <th scope="row">{{$category->id}}</th>
		      <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
		      <td>{{$category->created_at ? $category->created_at->toDayDateTimeString() : 'No date'}}</td>
		      <td>{{$category->updated_at ? $category->updated_at->toDayDateTimeString() : 'No date'}}</td>
		      <td class="text-center">
		      	@if($category->posts->count() > 0)
		      		<a href="{{route('admin.categories.show', $category->id)}}">{{$category->posts->count()}}</a>
		      	@else
		      	 	{{'No posts'}}
		      	@endif
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		{{ $categories->links() }}	
	</div>
</div>
@stop