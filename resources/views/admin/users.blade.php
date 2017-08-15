@section('content')
@extends('layouts.master')
	<h1>User Management</h1>
	<table class="table table-hover">
	    <thead>
	      	<tr>
	       		<th>Name</th>
	        	<th>Category</th>
	        	<th>Email</th>
	        	<th>Controls</th>
	      	</tr>
	    </thead>
	    <tbody>
			@foreach($users as $user)
	    		<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->category}}</td>
					<td>{{$user->email}}</td>
					<td>
						<a href="/admin/user/{{$user->id}}">
							<button class="btn btn-primary">Edit</button>
						</a>

						<a href="/admin/user/{{$user->id}}/delete">
							<button class="btn btn-danger">Delete</button>
						</a>

					</td>
				</tr>
			@endforeach	
	    </tbody>
	  </table>
@endsection