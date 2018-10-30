@extends('layouts.admin')

@section('content')

<h1>Posts Within Categories</h1>

@foreach($categories as $category)
	<h2>Category: {{$category->name}}</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
  	@if($posts)
	  	@foreach($category->posts as $post)
		    <tr>
		      <td>{{$post->id}}</td>
          <td><img height="50" src="{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/200'}}"></td>
		      <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
		      <td>{{substr($post->body, 10)}}</td>
		      <td>{{$post->created_at->toDayDateTimeString()}}</td>
		      <td>{{$post->updated_at->toDayDateTimeString()}}</td>
		    </tr>
	    @endforeach
    @endif
  </tbody>
</table>
@endforeach
{{ $categories->links() }}  
@stop