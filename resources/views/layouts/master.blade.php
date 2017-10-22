<html>
	<head>
		<title>
			Hoel Proj. For a Hotel.
		</title>
		<!--Boostrap CDN-->
		<link rel="stylesheet" 
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		  crossorigin="anonymous">
		<!--fonts-->
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
		<!--generic css-->
		<link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
		<!-- font-awesome -->
		<link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
	</head>

	<body>
	@include('layouts.nav')
	<div class="container">
		@yield('content')
	</div>
	@include('layouts.scripts')
	</body>
</html>