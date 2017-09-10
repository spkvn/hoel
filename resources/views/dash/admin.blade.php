@section('content')
@extends('layouts.master')
 	<div class="row">
	 	<div class="col-sm-12 dash_header">
			<h1>
				Hello, {{auth()->user()->name}}.
			</h1>
			<p>You are on the {{auth()->user()->category}} dashboard</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 hidden-sm hidden-xs dash_content">
			<h2>Some helpful links</h2>
		</div>
		<div class="col-md-9 col-sm-12 col-xm-12 dash_content">
			<a href="/admin/users">
				<div class="col-xs-6 dash_btn_div">
					<i class="fa fa-user" aria-hidden="true"></i>
					<p>Users</p>
				</div>
			</a>
			<a href="/admin/rooms">
				<div class="col-xs-6 dash_btn_div">
					<i class="fa fa-home" aria-hidden="true"></i>
					<p>Rooms</p>
				</div>
			</a>
			<a href="/admin/cards">
				<div class="col-xs-6 dash_btn_div">
					<i class="fa fa-id-card" aria-hidden="true"></i>
					<p>Cards</p>
				</div>
			</a>
			<a href="/admin/bookings">
				<div class="col-xs-6 dash_btn_div">
					<i class="fa fa-book" aria-hidden="true"></i>
					<p>Bookings</p>
				</div>
			</a>
		</div>
	</div> 
@endsection