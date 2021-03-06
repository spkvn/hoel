@extends('layouts.master')
@section('content')
	<div class="col-sm-12">

		<h1>Register</h1>
	
		<hr>
	
		<form method="POST" action="/register">
			
			{{csrf_field()}}
			
			<!--User Name-->
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" 
					   value="{{old('name')}}" required>
			</div>

			<!--User Email-->
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email"
					   value="{{old('email')}}" required>
			</div>

			<!--First Password-->
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" 
					   value="{{old('password')}}" required>
			</div>

			<!--Confirmation Password-->
			<div class="form-group">
				<label for="password_confirmation">Password Confirmation:</label>
				<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" required>
			</div>

			<!--User Category-->
			<div class="form-group">
				<label for="category">User Category:</label>
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