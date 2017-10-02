@section('content')
@extends('layouts.master')
	<link href="{{URL::asset('css/k_table.css')}}" type="text/css" rel="stylesheet">
	<div class="row">
		<div class="col-xs-12">
			<h1>Access Card Management</h1>
		</div>
		<div class="col-xs-12">
			<a href="/admin/card/create">
				<button class="btn btn-default" style="float:right;margin-top:2%;">
					Add Card
				</button>
			</a>
		</div>
	</div>
	@include('admin.search.cardsearch')
	@if(isset($cards))
		<table class="table table-hover">
		    <thead>
		      	<tr>
		    		<th>Card ID</th>
		    		<th>Access to Room:</th>
		    		<th>Rooms ID</th>
		    		<th>User</th>
		    		<th>Users ID</th>
		    		<th>Controls</th>
		      	</tr>
	      	</thead>
	    	<tbody>
	    	@foreach($cards as $card)
	    		<tr>
	    			<td>{{$card->id}}</td>
	    			@if(NULL !== $card->access)
		    			<td>{{$card->room->room_number}}</td>
		    			<td>{{$card->access}}</td>
		    		@else
		    			<td class="no_value">No room  </td>
		    			<td class="no_value">assigned.</td>
	    			@endif
	    			@if(NULL !== $card->user_id)
		    			<td>{{$card->user->name}}</td>
		    			<td>{{$card->user_id}}</td>
		    		@else
		    			<td class="no_value">No user</td>
		    			<td class="no_value">assigned.</td>
	    			@endif
	    			<td>
	    				<a href="/admin/card/{{$card->id}}">
	    					<button id="editCard{{$card->id}}" class="btn btn-primary">Edit</button>
	    				</a>


						<button type="button" id="deleteCard{{$card->id}}" 
								class="btn btn-danger" data-toggle="modal" 
								data-target="#deleteModal{{$card->id}}">
								Delete
						</button>

	    				<div class="modal fade" id="deleteModal{{$card->id}}" tabindex="-1" role="dialog" 
	    					 aria-labelledby="deleteModalLabel{{$card->id}}" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="deleteModalLabel{{$card->id}}">
											Delete Card {{$card->id}}?
										</h3>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>This cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<form class="form-inline" method="POST" action="/admin/card/{{$card->id}}">
											<button type="button" class="btn btn-primary" 
													data-dismiss="modal">
												Close
											</button>
											{{method_field('DELETE')}}
											{{csrf_field()}}
											<input  type="submit" id="delButton{{$card->id}}" 
													class="btn btn-danger" value="Delete">
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