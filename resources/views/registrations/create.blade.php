@extends('layouts.master')
@section('content')
	<div class="col-sm-12">

		<h1>Register</h1>
	
		<hr>
	
		<form method="POST" action="/register">
			
			{{csrf_field()}}
			
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" 
					   value="{{old('name')}}" required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email"
					   value="{{old('email')}}" required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" 
					   value="{{old('password')}}" required>
			</div>

			<div class="form-group">
				<label for="password_confirmation">Password Confirmation:</label>
				<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>

		</form>	
		
		@include('layouts.errors')
		
		<div class="form-group">
			<a href="/">
				<button type="submit" class="btn btn-default">
					Log In
				</button>
			</a>
		</div>
	</div>
@endsection