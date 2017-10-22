@extends('layouts.master')
@section('content')
	<div class="col-sm-12 login__container">
		<div class="col-sm-4"></div>
 		<div class="col-sm-4 centre-block login__div">
			<div class="col-sm-12 hotel__img short__div">
				<h1>Sign In</h1>
			</div>

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


				<button type="submit" class="btn btn-primary">Sign In</button>


			</form>
			<a href="/register">
				<button type="submit" class="btn btn-default">
						Register
				</button>
			</a>
			@include('layouts.errors')
		</div>
		<div class="col-sm-4"></div>
	</div>
@endsection