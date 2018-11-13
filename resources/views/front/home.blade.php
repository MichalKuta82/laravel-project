@extends('layouts.blog-home')

<div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            @if($posts)
            @foreach($posts as $post)
                <!-- Blog Post -->
                <h3>
                    <a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a>
                </h3>
                <p class="lead">
                    by {{$post->user->name}}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toDayDateTimeString()}}</p>
                <hr>
                <img class="img-responsive" src="{{$post->photo->file ? $post->photo->file : 'https://via.placeholder.com/600'}}" alt="">
                <hr>
                <p>{!! str_limit($post->body, 200) !!}</p>
                <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            @endforeach
            @endif
             <!-- Pager -->
            <div class="row">
                <div class="col-md-6 col-md-offset-5">
                    {{$posts->render()}}
                </div>
            </div>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
@include('includes.front_sidebar')

        </div>
        <!-- /.row -->

@section('content')

</div>

@endsection
