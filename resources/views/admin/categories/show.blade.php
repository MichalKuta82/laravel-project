@extends('layouts.admin')

@section('content')

	<div class="col-md-12">
		@foreach($categories as $category)
			<h1>Posts In Category {{$category->name}}</h1>
		@endforeach
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Post Name</th>
		      <th scope="col">Post Body</th>
		      <th scope="col">Created At</th>
		      <th scope="col">Updated At</th>
		    </tr>
		  </thead>
		  <tbody>
		  @if($posts->count() > 0)
		  	@foreach($posts as $post)
		    <tr>
		      <th scope="row">{{$post->id}}</th>
		      <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
		      <td>{{substr($post->body, 10)}}</td>
		      <td>{{$post->created_at ? $post->created_at->toDayDateTimeString() : 'No date'}}</td>
		      <td>{{$post->updated_at ? $post->created_at->toDayDateTimeString() : 'No date'}}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		@else
			<p>There is no posts in this category.</p>
		@endif
	</div>
</div>
@stop