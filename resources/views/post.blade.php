@extends('layouts.blog-post')

@section('content')

@if(Session::has('comment'))
  <div class="alert alert-success text-center">{{session('comment')}}</div>
@endif
@if(Session::has('reply'))
  <div class="alert alert-success text-center">{{session('reply')}}</div>
@endif


        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at ? $post->created_at->toDayDateTimeString() : 'No date'}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-thumbnail" src="{{$post->photo ? $post->photo->file : $post->placeholder()}}">

        <hr>

        <!-- Post Content -->
        <p class="lead">{!! $post->body !!}</p>

        <hr>


        <!-- Blog Comments -->

    @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
	    <!--<form action="/posts" method="post">-->
		{!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}
			<input type="hidden" name="post_id" value="{{$post->id}}">
		  <div class="form-group {{$errors->has('body') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('body', 'Body:', ['for' => 'body']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Comment', 'name' => 'body', 'rows' => 4]) !!}
		    @if($errors->has('body'))
		    	{{$errors->first('body')}}
		    @endif
		  </div>
		  {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}
        </div>
    @endif
        <hr>

        <!-- Posted Comments -->
    @if(count($comments) > 0)
        @foreach($comments as $comment)
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" height="64" src="{{Auth::user()->gravatar}}" alt="">
            </a>
            <div idclass="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at ? $comment->created_at->toDayDateTimeString() : 'No date'}}</small>
                </h4>
                <p>{{$comment->body}}</p>

                <!-- Reply Form -->
                    <div class="comment-reply-container">
                            <button type="button" class="btn btn-primary toggle-reply pull-right">Reply</button>
                        <div class="comment-reply">
                            <h5>Leave a Reply:</h5>
                            <!--<form action="/posts" method="post">-->
                            {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createreply']) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                              <div class="form-group {{$errors->has('body') ? 'has-error' : '' }}">
                                <!--<label for="post_title">Post Title</label>-->
                                {!! Form::label('body', 'Body:', ['for' => 'body']) !!}
                                <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
                                {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Reply', 'name' => 'body', 'rows' => 2]) !!}
                                @if($errors->has('body'))
                                    {{$errors->first('body')}}
                                @endif
                              </div>
                              {!! Form::submit('Submit Reply', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
                              <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
                            {!! Form::close() !!}
                        </div>
                    </div>

                <!-- Nested Reply -->
                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                            <div class="media nested-reply">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="64" src="{{$reply->photo ? $reply->photo : 'https://via.placeholder.com/64'}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at ? $reply->created_at->toDayDateTimeString() : 'No date'}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>
                            </div>
                        <!-- End Nested Reply -->
                        @else
                            <h3 class="text-center">Reply not active</h3>
                        @endif
                    @endforeach
                @else
                    <h3 class="text-center">No replies</h3>
                @endif
            </div>
        </div>
        @endforeach
    @endif
@stop

@section('scripts')

    <script type="text/javascript">
        
        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");
        });

    </script>
@stop