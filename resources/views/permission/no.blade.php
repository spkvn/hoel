@extends('layouts.master')
@section('content')
	<div class="col-lg-12">
		<h1>Inadequate Permissions</h1>
		<p>You do not have sufficient permissions to access this part of hoel. Please return to a permissable area.</p>
		<a href="window.history.back()">
			<button class="btn btn-back">Go Back</button>
		</a>
		<a href="/dashboard">
			<button class="btn btn-back">Go to Dashboard</button>
		</a>
	</div>
@endsection