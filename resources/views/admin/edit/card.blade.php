@section('content')
@extends('layouts.master')
	<h1>Edit Card {{$card->id}}</h1>
	<form method="POST" action="/admin/card/{{$card->id}}">
		{{csrf_field()}}
		<div class="form-group">
			<h2>Information</h2>
			<label for="room_number">Room Number</label> 
			<input type="text" name="room_number" id="room_number" class="form-control" placeholder="1001" value="{{$card->room->room_number}}">
			<hr/>
			<label for="email">Email</label> 
			<input type="email" name="email" id="email" class="form-control" placeholder="email@address.com" value="{{$card->user->email}}">
			<hr/>
		</div>
		@include('layouts.errors')
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection