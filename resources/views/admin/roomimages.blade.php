@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-4">
			<h1>Room {{$room->room_number}}s Images</h1>
		</div>
		<div class="col-xs-8">
			<a href="/admin/room/{{$room->id}}/image/create">
				Add Image
			</a>
		</div>
	</div>
	@if(count($images) > 0)
	<div class="row">
		<div class="col-xs-12">
			@foreach($images as $img)
				<div class="col-md-4 col-xs-6">
					<img src="{{$img->path}}" alt="{{$img->alt}}">
					<form action="/admin/room/{{$room->id}}/image/{{$img->id}}/">
						{{method_field('DELETE')}}
						{{csrf_field()}}
						<input class="btn btn-danger" type="submit" value="Delete?">
					</form>
				</div>
			@endforeach
		</div>
	</div>
	@else
	<div class="row">
		<div class="col-xs-12">
			<h2>Room {{$room->room_number}} has no images.</h2>
			<p>
				<a href="/admin/room/{{$room->id}}/image/create">
					Add an image.
				</a>
			</p>
		</div>
	</div>
	@endif
@endsection