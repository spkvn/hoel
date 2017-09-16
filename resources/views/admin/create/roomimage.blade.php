@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-12">
			<h1>Add image to {{$room->room_number}}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 dropzone-div">
			<form action="/admin/room/{{$room->id}}/image" 
				  class="col-xs-12 dropzone" id="roomImageDropzone">
					{{csrf_field()}}
			</form>
		</div>
		@include('layouts.errors')
	</div>
	<script type="text/javascript" src="{{URL::asset('js/dropzone.js')}}"></script>
@endsection