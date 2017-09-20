@section('content')
@extends('layouts.master')
	<div class="row">
		<div class="col-xs-4">
			<h1>Room {{$room->room_number}}s Images</h1>
		</div>
		<div class="col-xs-8 header-add-item-box">
			<a href="/admin/room/{{$room->id}}/image/create">
				<i class="fa fa-picture-o" aria-hidden="true"> Add Image</i>
			</a>
		</div>
	</div>
	@if(count($images) > 0)
	<div class="row">
		<div class="col-xs-12">
			@foreach($images as $img)
				<div class="col-md-4 col-xs-6">
					<img class="room-images" src="{{$img->path}}" alt="{{$img->alt}}">
					<form 
					action="/admin/room/{{$room->id}}/image/{{$img->id}}"
                	method="POST">
            		  	{{ method_field('DELETE') }}
						{{ csrf_field() }}
					    <input class="btn btn-danger" type="submit" value="Delete">
                	</form>

					<!-- form method="POST"
						  action="/admin/room/{{$room->id}}/image/{{$img->id}}" >
						{{method_field('delete')}}
						{{csrf_field()}}
						<input class="btn btn-danger" type="submit" value="Delete">
					</form> -->
				</div>
			@endforeach
		</div>
	</div>
	@else
	<div class="row">
		<div class="col-xs-4">
			<h2>Room {{$room->room_number}} has no images.</h2>
		</div>
		<div class="col-xs-8">
			<p>
				<a href="/admin/room/{{$room->id}}/image/create">
					<i class="fa fa-picture-o" aria-hidden="true"> Add Image</i>
				</a>
			</p>
		</div>
	</div>
	@endif
@endsection