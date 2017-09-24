@section('content')
@extends('layouts.master')
	<h1>Update your booking</h1>
	<form method="POST" action="/patron/booking/{{$booking->room->id}}/{{$booking->user->id}}/{{$booking->check_in}}">
		{{csrf_field()}}
		<input type="hidden" name="origRoom_id" value="{{ $booking->room->id }}">
		<input type="hidden" name="origUser_id" value="{{ auth()->user()->id }}">
		<input type="hidden" name="origCheck_in" value="{{ $booking->check_in}}">
		<div class="form-group">
			<h2>Information</h2>
			<label for="room_number">Room Number</label> 
			<input type="text" name="room_number" id="room_number" class="form-control" value="{{$booking->room->room_number}}">
			<label for="check_in">Check In</label> 
			<input type="date" name="check_in" id="check_in" class="form-control" value="{{$booking->check_in}}">
			<hr/>
			<label for="check_out">Check Out</label> 
			<input type="date" name="check_out" id="check_out" class="form-control" value="{{$booking->check_out}}">
			<hr/>
		</div>
		@include('layouts.errors')
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection