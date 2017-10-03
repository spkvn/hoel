@section('content')
@extends('layouts.master')
	<h1>Create New Booking</h1>
	<form method="POST" action="/admin/booking/store">
		{{csrf_field()}}
		<div class="form-group">
			<h2>Information</h2>
			<label for="room_number">Room Number</label> 
			<input type="text" name="room_number" id="room_number" class="form-control" placeholder="3034" value="{{old('room_number')}}">
			<hr/>
			<label for="email">Email</label> 
			<input type="email" name="email" id="email" class="form-control" placeholder="email@address.com" value="{{old('email')}}">
			<hr/>
			<label for="check_in">Check In</label> 
			<input type="text" name="check_in" id="check_in" class="form-control" placeholder="{{date('d/m/Y')}}" value="{{old('check_in')}}">
			<hr/>
			<label for="check_out">Check Out</label> 
			<input type="text" name="check_out" id="check_out" class="form-control" placeholder="{{date('d/m/Y', strtotime('+1 day'))}}" value="{{old('check_out')}}">
			<hr/>
		</div>
		@include('layouts.errors')
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection