@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_photo'))
  <div class="alert alert-danger text-center">{{session('deleted_photo')}}</div>
@endif
@if(Session::has('deleted_photos'))
  <div class="alert alert-danger text-center">{{session('deleted_photos')}}</div>
@endif
@if(Session::has('updated_photo'))
  <div class="alert alert-success text-center">{{session('updated_photo')}}</div>
@endif
@if(Session::has('created_photo'))
  <div class="alert alert-success text-center">{{session('created_photo')}}</div>
@endif

<h1>Media</h1>

<form action="delete/media" method="post" class="form-inline">
  {{csrf_field()}}
  {{method_field('delete')}}
  <div class="form-group">
    <select name="checkBoxArray" class="form-control">
      <option value="">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="delete_all">
  </div>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th scope="col">Id</th>
        <th scope="col">Photo</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
      </tr>
    </thead>
    <tbody>
    	@if($photos)
  	  	@foreach($photos as $photo)
  		    <tr>
            <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
  		      <td>{{$photo->id}}</td>
            <td><img height="100" src="{{$photo->file ? $photo->file : 'https://via.placeholder.com/200'}}"></td>
  		      <td>{{$photo->created_at->toDayDateTimeString()}}</td>
  		      <td>{{$photo->updated_at->toDayDateTimeString()}}</td>
            <td>
              <input type="hidden" name="photo" value="{{$photo->id}}">
              <!--single delete button-->
              <!--<div class="form-group">
                <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
              </div>-->
            </td>
  		    </tr>
  	    @endforeach
      @endif
    </tbody>
  </table>
</form>
{{ $photos->links() }}  

@stop

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      
      $('#options').click(function(){

        if(this.checked){

          $('.checkBoxes').each(function(){

            this.checked = true;
          });
        }else {

            $('.checkBoxes').each(function(){

            this.checked = false;
          });
        }
      });
    });
  </script>
@stop