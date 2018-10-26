@extends('layouts.admin')

@section('content')

@if(Session::has('created_post'))
  <div class="alert alert-success text-center">{{session('created_post')}}</div>
@endif
@if(Session::has('updated_post'))
  <div class="alert alert-success text-center">{{session('updated_post')}}</div>
@endif
@if(Session::has('deleted_post'))
  <div class="alert alert-alert text-center">{{session('deleted_post')}}</div>
@endif

	<h1>Posts</h1>

		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Photo</th>
		      <th scope="col">Owner</th>
		      <th scope="col">Category Name</th>
		      <th scope="col">Title</th>
		      <th scope="col">Body</th>
		      <th scope="col">Created At</th>
		      <th scope="col">Updated At</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($posts)
			  	@foreach($posts as $post)
				    <tr>
				      <th scope="row">{{$post->id}}</th>
				      <td><img width="50" src="{{($post->photo_id > 0) ? $post->photo->file : 'https://via.placeholder.com/200'}}"></td>
				      <td>{{$post->user->name}}</td>
				      <td>{{($post->category_id > 0) ? $post->category->name : 'Uncategorized'}}</td>
				      <td>{{$post->title}}</td>
				      <td>{{$post->body}}</td>
				      <td>{{$post->created_at->toDayDateTimeString()}}</td>
				      <td>{{$post->updated_at->toDayDateTimeString()}}</td>
				    </tr>
			  	@endforeach
		  	@endif
		  </tbody>
		</table>

@stop