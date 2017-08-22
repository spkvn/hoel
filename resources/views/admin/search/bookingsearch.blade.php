<div class="row">
	<form method="POST" action="/admin/room/search">
		{{csrf_field()}}
		<div class="col-xs-12 col-sm-8">
			<input type="text" name="search_term" id="search_term" class="form-control" placeholder="Search property:value, or just a value to search by booker name" value="{{old('search_term')}}">
		</div>
		<div class="col-xs-12 col-sm-4">
			<input type="submit" class="btn btn-primary" value="Search">
		</div>
	</form>
</div>
@include('layouts.errors')