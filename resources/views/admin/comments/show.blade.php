@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_comment'))
  <div class="alert alert-danger text-center">{{session('deleted_comment')}}</div>
@endif
@if(Session::has('approved_comment'))
  <div class="alert alert-success text-center">{{session('approved_comment')}}</div>
@endif
@if(Session::has('unapproved_comment'))
  <div class="alert alert-info text-center">{{session('unapproved_comment')}}</div>
@endif

	<div class="col-md-12">
		@if($comments)
		<h1>Comments</h1>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Author</th>
		      <th scope="col">Email</th>
		      <th scope="col">Comment</th>
		      <th scope="col">Created At</th>
		      <th scope="col">Updated At</th>
		      <th scope="col">Post</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($comments as $comment)
		    <tr>
		      <td scope="row">{{$comment->id}}</td>
		      <td>{{$comment->author}}</td>
		      <td>{{$comment->email}}</td>
		      <td><a href="{{route('admin.comments.edit', $comment->id)}}">{{str_limit($comment->body, 10)}}</a></td>
		      <td>{{$comment->created_at ? $comment->created_at->toDayDateTimeString() : 'No date'}}</td>
		      <td>{{$comment->updated_at ? $comment->updated_at->toDayDateTimeString() : 'No date'}}</td>
		      <td><a href="{{route('home.post', $comment->post->id)}}">View post</a></td>
		      <td>
		      	@if($comment->is_active == 1)
					<!--<form action="/posts" method="post">-->
					{!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
						<input type="hidden" name="is_active" value="0">
					  {!! Form::submit('Unapprove', ['class' => 'btn btn-success', 'name' => 'submit']) !!}
					  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
					{!! Form::close() !!}
				@else
					<!--<form action="/posts" method="post">-->
					{!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
						<input type="hidden" name="is_active" value="1">
					  {!! Form::submit('Approve', ['class' => 'btn btn-info', 'name' => 'submit']) !!}
					  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
					{!! Form::close() !!}
		      	@endif
		      </td>
		      <td>
	      		<!--<form action="/posts" method="post">-->
				{!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
					<input type="hidden" name="is_active" value="1">
				  {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'name' => 'submit']) !!}
				  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
				{!! Form::close() !!}
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		@else
			<h1 class="text-center">No comments</h1>
		@endif
	</div>
</div>
@stop