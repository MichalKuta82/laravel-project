@extends('layouts.admin')

@section('content')

@if(Session::has('created_post'))
  <div class="alert alert-success text-center">{{session('created_post')}}</div>
@endif
@if(Session::has('updated_post'))
  <div class="alert alert-success text-center">{{session('updated_post')}}</div>
@endif
@if(Session::has('deleted_post'))
  <div class="alert alert-danger text-center">{{session('deleted_post')}}</div>
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
		      <th scope="col">Comments</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($posts)
			  	@foreach($posts as $post)
				    <tr>
				      <th scope="row">{{$post->id}}</th>
				      <td><img width="50" src="{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/200'}}"></td>
				      <td><a href="{{route('admin.users.edit', $post->user->id)}}">{{$post->user->name}}</a></td>
				      <td><a href="{{route('admin.categories.edit', $post->category->id)}}">{{($post->category_id > 0) ? $post->category->name : 'Uncategorized'}}</a></td>
				      <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
				      <td>{{str_limit($post->body, 15)}}</td>
				      <td>{{$post->created_at->toDayDateTimeString()}}</td>
				      <td>{{$post->updated_at->toDayDateTimeString()}}</td>
				      <td>
				      	@if(count($post->comments) > 0)
				      		<a href="{{route('admin.comments.show', $post->id)}}">{{count($post->comments)}}</a>
				      	@else
				      		<p>No Comments</p>
				      	@endif
				      </td>
				      <td><a href="{{route('home.post', $post->slug)}}">View post</a></td>
				    </tr>
			  	@endforeach
		  	@endif
		  </tbody>
		</table>
		{{ $posts->links() }}	
@stop