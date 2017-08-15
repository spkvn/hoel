@section('content')
@extends('layouts.master')
	<h1>Edit User {{$user->name}}</h1>
	<form method="POST" action="/admin/user/{{$user->id}}">
		{{csrf_field()}}
		<div class="form-group">
			<h2>User Information</h2>
			<label for="name">Name:</label> 
			<input type="text" name="name" id="name" class="form-control" placeholder="{{$user->name}}" value="{{old('name')}}">
			<hr/>
			<label for="email">Email Address:</label> 
			<input type="email" name="email" id="email" class="form-control" placeholder="{{$user->email}}" value="{{old('email')}}">
			<hr/>
			<label for="password">Password:</label> 
			<input type="password" name="password" id="password" class="form-control">
			<label for="password_confirmation">Confirm Password:</label> 
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
			<hr/>
		</div>
		<div class="form-group">
			<h2>User Roles</h2>
			<p>{{$user->name}} is currently has the {{$user->category}} Role</p>
			<label for="category">User Category</label>
			<select class="form-control" name="category" id="category">
				<option value="Administrator"
					@if(old('category')=='Administrator')
						selected="selected"
					@endif
					>
						Administrator
					</option>
					<option value="Reception"
					@if(old('category')=='Reception')
						selected="selected"
					@endif
					>
						Reception
					</option>
					<option value="Housekeeping"
					@if(old('category')=='Housekeeping')
						selected="selected"
					@endif>
						Housekeeping
					</option>
					<option value="Patron"
					@if(old('category')=='Patron')
						selected="selected"
					@endif>
						Patron
					</option>
				</select>
		</div>
		@include('layouts.errors')
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection