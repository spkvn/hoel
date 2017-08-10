@extends('layouts.master')
@section('content')
	<div class="col-sm-12">
 		
		<h1>Sign In</h1>
		
		<hr>
		
		<form method="POST" action="/login">
			
			{{csrf_field()}}
			
			<div class="form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" id="email" name="email" 
				value="{{old('email')}}">
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Sign In</button>
			</div>

			@include('layouts.errors')
		</form> 
		<div class="form-group">
			<a href="/register">
				<button type="submit" class="btn btn-default">
					Register
				</button>
			</a>
		</div>

	</div>
@endsection