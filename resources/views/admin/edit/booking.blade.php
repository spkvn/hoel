@section('content')
@extends('layouts.master')
	<h1>Edit Booking</h1>
	<p>
		Edit {{$booking->user->name}}'s booking in room {{$booking->room->room_number}} for {{$booking->check_in}}
	</p>
	<form method="POST" action="/admin/booking/{{$booking->room->id}}/{{$booking->user->id}}/{{$booking->check_in}}">
		{{csrf_field()}}
		<input type="hidden" name="origRoom_id" value="{{ $booking->room->id }}">
		<input type="hidden" name="origUser_id" value="{{ $booking->user->id }}">
		<input type="hidden" name="origCheck_in" value="{{ $booking->check_in}}">
		<div class="form-group">
			<h2>Information</h2>
			<label for="room_number">Room Number</label> 
			<input type="text" name="room_number" id="room_number" class="form-control" value="{{$booking->room->room_number}}">
			<hr/>
			<label for="email">Email</label> 
			<input type="email" name="email" id="email" class="form-control" value="{{$booking->user->email}}">
			<hr/>
			<label for="check_in">Check In</label> 
			<input type="text" name="check_in" id="check_in" class="form-control" 
				value="{{date('d/m/Y', time($booking->check_in))}}"
			>
			<hr/>
			<label for="check_out">Check Out</label> 
			<input type="text" name="check_out" id="check_out" class="form-control" 
				value="{{date('d/m/Y', time($booking->check_out))}}
				">
			<hr/>
		</div>
		@include('layouts.errors')
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection