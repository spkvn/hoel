@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-12">
			<h1>Add image to {{$room->room_number}}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 dropzone-div">
			<form action="admin/{{$room->id}}/image" 
				  class="col-xs-12 dropzone" id="roomImageDropzone">
				
			</form>
		</div>
	</div>
	<script type="text/javascript" src="{{URL::asset('js/dropzone.js')}}"></script>
@endsection