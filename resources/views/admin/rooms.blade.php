@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-12">
			<h1>Room Management</h1>
		</div>
		<div class="col-xs-12">
			<a href="/admin/room/create"><button class="btn btn-default" style="float:right;">Add Room</button></a>
		</div>
	</div>
	@include('admin.search.roomsearch')
	@if(isset($rooms))
		<table class="table table-hover">
		    <thead>
		      	<tr>
		       		<th>ID</th>
		        	<th>Room Number</th>
		        	<th>Beds</th>
		        	<th>Capacity</th>
		        	<th>Price Per Night</th>
		        	<th>Controls</th>
		      	</tr>
		    </thead>
		    <tbody>
					@foreach($rooms as $room)
			    		<tr>
							<td>{{$room->id}}</td>
							<td>{{$room->room_number}}</td>
							<td>{{$room->beds}}</td>
							<td>{{$room->max_capacity}}</td>
							<td>${{$room->price_per_night}}</td>
							<td>
								<a href="/admin/room/{{$room->id}}">
									<button id="editRoom{{$room->id}}" class="btn btn-primary">Edit</button>
								</a>
								<a href="/admin/room/{{$room->id}}/image">
									<button class="btn btn-primary">Images</button>
								</a>
								<button type="button" id="deleteRoom{{$room->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$room->id}}">Delete</button>
								
								<div class="modal fade" id="deleteModal{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$room->name}}" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="modal-title" id="deleteModalLabel{{$room->name}}">Delete Room {{$room->room_number}}?</h3>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>This cannot be undone.</p>
											</div>
											<div class="modal-footer">
												<form class="form-inline" method="POST" action="/admin/room/{{$room->id}}">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
													{{method_field('delete')}}
													{{csrf_field()}}
													<input id="delButton{{$room->id}}" type="submit" class="btn btn-danger" value="Delete">
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