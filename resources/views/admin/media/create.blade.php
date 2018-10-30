@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@stop

@section('content')

<div class="row">
    <div class="col-md-6">	
		<h1>Upload media</h1>
		{!! Form::open(['method' => 'POST', 'action' => 'AdminMediasController@store', 'class'=>'dropzone']) !!}
		{!! Form::close() !!}
	</div>
</div>
@stop

@section('scripts')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@stop