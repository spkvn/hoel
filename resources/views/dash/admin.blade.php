@section('content')
@extends('layouts.master')
 	<div class="col-sm-12">
		<h1>
			Hello, {{auth()->user()->name}}.
		</h1>
		<p>You are on the {{auth()->user()->category}} dashboard</p>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-12 col-xm-12">
			<h2>Some helpful links</h2>
		</div>
		<div class="col-md-9 col-sm-12 col-xm-12">
			<a href="/users">
				<button class="btn btn-default">Users</button>
			</a>
			<a href="/rooms">
				<button class="btn btn-default">Rooms</button>
			</a>
			<a href="/cards">
				<button class="btn btn-default">Cards</button>
			</a>
		</div>
	</div> 
@endsection