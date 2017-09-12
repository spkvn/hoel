@section('content')
@extends('layouts.master')
 	<div class="col-sm-12">
		<h1>
			Hello, {{auth()->user()->name}}.
		</h1>
		<p>You are on the {{auth()->user()->category}} dashboard</p>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-12 col-xs-12">
			<h2>Some helpful links</h2>
			<h3>Put some buttons here</h3>
		</div>
		<div class="col-md-9 col-sm-12 col-xs-12">
			@if(!(isset($currentBooking) && isset($futureBookings)))
				<h2>You have no bookings.</h2>
			@endif
			@if(isset($currentBooking))
				<h2>Your current Booking </h2>
				<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="col-xs-12">
								Booking for:<br/> 
								<strong>{{auth()->user()->name}}</strong>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="col-xs-12">
								Room Number: {{$currentBooking->room->room_number}}
							</div>
							<div class="col-xs-6">
								Check in: {{\Carbon\Carbon::createFromTimeStamp(strtotime($currentBooking->check_in))->toFormattedDateString()}}
							</div>
							<div class="col-xs-6">
								Check out: {{\Carbon\Carbon::createFromTimeStamp(strtotime($currentBooking->check_out))->toFormattedDateString()}}
							</div>
						</div>				
					</div>
				<hr/>
			@endif
			@if(isset($futureBookings))
				<h2>Your Future bookings</h2>
				@foreach($futureBookings as $booking)
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="col-xs-12">
								Booking for:<br/> 
								<strong>{{auth()->user()->name}}</strong>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="col-xs-12">
								Room Number: {{$booking->room->room_number}}
							</div>
							<div class="col-xs-6">
								Check in: {{\Carbon\Carbon::createFromTimeStamp(strtotime($booking->check_in))->toFormattedDateString()}}
							</div>
							<div class="col-xs-6">
								Check out: {{\Carbon\Carbon::createFromTimeStamp(strtotime($booking->check_out))->toFormattedDateString()}}
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="col-xs-12">
								<a href="/patron/booking/{{$booking->room_id}}/{{$booking->user_id}}/{{$booking->check_in}}">
									<button class="btn btn-primary">Edit</button>
								</a>
							</div>
						</div>				
					</div>
					<hr/>
				@endforeach
			@endif
		</div>
	</div> 
@endsection