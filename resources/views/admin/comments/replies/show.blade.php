@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_reply'))
  <div class="alert alert-danger text-center">{{session('deleted_reply')}}</div>
@endif
@if(Session::has('approved_reply'))
  <div class="alert alert-success text-center">{{session('approved_reply')}}</div>
@endif
@if(Session::has('unapproved_reply'))
  <div class="alert alert-info text-center">{{session('unapproved_reply')}}</div>
@endif

	<div class="col-md-12">
		@if($replies)
		<h1>Replies</h1>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Author</th>
		      <th scope="col">Email</th>
		      <th scope="col">Reply</th>
		      <th scope="col">Created At</th>
		      <th scope="col">Updated At</th>
		      <th scope="col">Post</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($replies as $reply)
		    <tr>
		      <td scope="row">{{$reply->id}}</td>
		      <td>{{$reply->author}}</td>
		      <td>{{$reply->email}}</td>
		      <td><a href="{{route('admin.comments.replies.edit', $reply->id)}}">{{str_limit($reply->body, 10)}}</a></td>
		      <td>{{$reply->created_at ? $reply->created_at->toDayDateTimeString() : 'No date'}}</td>
		      <td>{{$reply->updated_at ? $reply->updated_at->toDayDateTimeString() : 'No date'}}</td>
		      <td><a href="{{route('home.post', $reply->comment->post->slug)}}">View Post</a></td>
		      <td>
		      	@if($reply->is_active == 1)
					<!--<form action="/posts" method="post">-->
					{!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
						<input type="hidden" name="is_active" value="0">
					  {!! Form::submit('Unapprove', ['class' => 'btn btn-success', 'name' => 'submit']) !!}
					  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
					{!! Form::close() !!}
				@else
					<!--<form action="/posts" method="post">-->
					{!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
						<input type="hidden" name="is_active" value="1">
					  {!! Form::submit('Approve', ['class' => 'btn btn-info', 'name' => 'submit']) !!}
					  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
					{!! Form::close() !!}
		      	@endif
		      </td>
		      <td>
	      		<!--<form action="/posts" method="post">-->
				{!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
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
			<h1 class="text-center">No replies</h1>
		@endif
	</div>
</div>
@stop