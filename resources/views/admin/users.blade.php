@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-12">
			<h1>User Management</h1>
		</div>
		<div class="col-xs-12">
			<a href="/admin/user/create">
				<button class="btn btn-default" style="float:right;">
					Add User
				</button>
			</a>
		</div>
	</div>
	@include('admin.search.usersearch')
	@if(isset($users))
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
									<button id="editUser{{$user->id}}"class="btn btn-primary">Edit</button>
								</a>

								<button type="button" id="deleteUser{{$user->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">Delete</button>
								
								<div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$user->name}}" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="modal-title" id="deleteModalLabel{{$user->name}}">Delete {{$user->name}}?</h3>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>This cannot be undone.</p>
											</div>
											<div class="modal-footer">
												<form class="form-inline" method="POST" action="/admin/user/{{$user->id}}">
													<button  type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
													{{method_field('DELETE')}}
													{{csrf_field()}}
													<input id="delButton{{$user->id}}" type="submit" class="btn btn-danger" value="Delete">
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