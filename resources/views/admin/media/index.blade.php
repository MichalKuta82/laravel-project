@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
  <div class="alert alert-danger text-center">{{session('deleted_user')}}</div>
@endif
@if(Session::has('updated_user'))
  <div class="alert alert-success text-center">{{session('updated_user')}}</div>
@endif
@if(Session::has('created_user'))
  <div class="alert alert-success text-center">{{session('created_user')}}</div>
@endif

<h1>Photos</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
  	@if($photos)
	  	@foreach($photos as $photo)
		    <tr>
		      <td>{{$photo->id}}</td>
          <td><img height="100" src="{{$photo->file ? $photo->file : 'https://via.placeholder.com/200'}}"></td>
		      <td><a href="{{route('admin.media.edit', $photo->id)}}">{{$photo->name}}</a></td>
		      <td>{{$photo->created_at->toDayDateTimeString()}}</td>
		      <td>{{$photo->updated_at->toDayDateTimeString()}}</td>
          <td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'name' => 'submit']) !!}
              <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
            {!! Form::close() !!}
          </td>
		    </tr>
	    @endforeach
    @endif
  </tbody>
</table>
{{ $photos->links() }}  
@stop