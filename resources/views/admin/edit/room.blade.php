@section('content')
@extends('layouts.master')
	<h1>Edit Room {{$room->room_number}}</h1>
	<form method="POST" action="/admin/room/{{$room->id}}">
		{{csrf_field()}}
		<div class="form-group">
			<h2>Information</h2>
			<label for="room_number">Room Number</label> 
			<input type="text" name="room_number" id="room_number" class="form-control" placeholder="{{$room->room_number}}" value="{{old('room_number')}}">
			<hr/>
			<label for="beds">Number of Beds</label> 
			<input type="number" name="beds" id="beds" class="form-control" placeholder="{{$room->beds}}" value="{{old('beds')}}">
			<hr/>
			<label for="max_capacity">Room Capacity</label> 
			<input type="number" name="max_capacity" id="max_capacity" class="form-control" placeholder="{{$room->max_capacity}}" value="{{old('max_capacity')}}">
			<hr/>
			<label for="name">Price Per Night</label> 
			<input type="number" name="price_per_night" id="price_per_night" class="form-control" placeholder="{{$room->price_per_night}}" value="{{old('price_per_night')}}">
			<hr/>
		</div>
		@include('layouts.errors')
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection