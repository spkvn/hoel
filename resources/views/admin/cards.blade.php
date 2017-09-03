@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-4">
			<h1>Access Card Management</h1>
		</div>
		<div class="col-xs-8">
			<a href="/admin/booking/create"><button class="btn btn-default" style="float:right;margin-top:2%;">Add Card</button></a>
		</div>
	</div>
	@include('admin.search.cardsearch')
	@if(isset($cards))
		<table class="table table-hover">
		    <thead>
		      	<tr>
		    		<th>ID</th>
		    		<th>Access to Room:</th>
		    		<th>Room's ID</th>
		    		<th>User</th>
		    		<th>User's ID</th>
		    		<th>Controls</th>
		      	</tr>
	      	</thead>
	    	<tbody>
	    	@foreach($cards as $card)
	    		<tr>
	    			<td>{{$card->id}}</td>
	    			<td>{{$card->room->room_number}}</td>
	    			<td>{{$card->room->id}}</td>
	    			<td>{{$card->user->name}}</td>
	    			<td>{{$card->user_id}}</td>
	    			<td>btns go here</td>
	    		</tr>
	    	@endforeach
	    	</tbody>
	    </table>
	@endif
@endsection