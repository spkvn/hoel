@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-12">
			<h1>Booking Management</h1>
		</div>
		<div class="col-xs-12">
			<a class="add_button" href="/admin/booking/create">
				<button class="btn btn-default" style="float:right;margin-top:2%;">
					Add Booking
				</button>
				{{-- <i class="fa fa-book" aria-hidden="true"></i>
				Add Booking --}}
			</a>
		</div>
	</div>
	@include('admin.search.bookingsearch')
	@if(isset($bookings))
		<table class="table table-hover">
		    <thead>
		      	<tr>
		       		<th>Room ID</th>
		        	<th>Room Number</th>
		        	<th>User ID</th>
		        	<th>User Name</th>
		        	<th>Check In</th>
		        	<th>Check Out</th>
		        	<th>Price</th>
		        	<th>Controls</th>
		      	</tr>
		    </thead>
		    <tbody>
					@foreach($bookings as $booking)
			    		<tr>
							<td>{{$booking->room_id}}</td>
							<td>{{$booking->room->room_number}}</td>
							<td>{{$booking->user_id}}</td>
							<td>{{$booking->user->name}}</td>
							<td>{{$booking->check_in}}</td>
							<td>{{$booking->check_out}}</td>
							<td>${{$booking->cost()}}</td>
							<td>
								<a href="/admin/booking/{{$booking->room_id}}/{{$booking->user_id}}/{{$booking->check_in}}">
									<button 
										id="editBooking{{$booking->room_id}}{{$booking->user_id}}{{$booking->check_in}}" 
										class="btn btn-primary">Edit</button>
								</a>

								<button type="button" class="btn btn-danger" data-toggle="modal" 
								data-target="#deleteModal{{$booking->_room_id.'_'.$booking->user_id}}">Delete</button>
								
								<div class="modal fade" id="deleteModal{{$booking->_room_id.'_'.$booking->user_id}}" 
									 tabindex="-1" role="dialog" 
									 aria-labelledby="deleteModalLabel{{$booking->_room_id.'_'.$booking->user_id}}" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="modal-title" id="deleteModalLabel{{$booking->_room_id.'_'.$booking->user_id.'_'.$booking->check_in}}">Delete Room Booking for {{$booking->user->name.' in room '.$booking->room->room_number}}?</h3>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>This cannot be undone.</p>
											</div>
											<div class="modal-footer">
												<form class="form-inline" method="POST" action="/admin/booking/{{$booking->room_id.'/'.$booking->user_id.'/'.$booking->check_in}}">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
													{{method_field('DELETE')}}
													{{csrf_field()}}
													<input id="deleteBooking{{$booking->room_id}}{{$booking->user_id}}{{$booking->check_in}}" 
													type="submit" class="btn btn-danger" value="Delete">
												</form>									
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					@endforeach	
		    </tbody>
		</table>
	@endif
@endsection