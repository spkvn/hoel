@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-4">
			<h1>Your past bookings</h1>
		</div>
		<div class="col-xs-8">
			<a class="add_button" href="/admin/booking/create">
				<i class="fa fa-book" aria-hidden="true"></i>
				<p>Add Booking</p>
			</a>
		</div>
	</div>
	@if(isset($pastBookings))
		<div class="row">
			@foreach($pastBookings as $booking)
			<div class="col-xs-12">
				<div class="col-xs-4">
					<h2>
						{{DisplayService::FormattedDateString($booking->check_in)}}
					</h2>
				</div>
				<div class="col-xs-8">
					<div class="col-xs-6">
						Booking for: {{$booking->user->name}}
					</div>
					<div class="col-xs-6">
						In Room: {{$booking->room->room_number}}
					</div>
					<div class="col-xs-12">
						Check Out:{{DisplayService::FormattedDateString($booking->check_out)}}	
					</div>
					<div class="col-xs-12">
						Cost: ${{$booking->cost()}}	
					</div>
				</div>
			</div>
			@endforeach
		</div>
	@else
		<div class="row">
			<div class="col-xs-12">
				<p>You have no previous bookings.</p>
			</div>
		</div>
	@endif
@endsection