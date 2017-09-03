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
	</head>

	<body>
	@include('layouts.nav')
	@include('layouts.background')
	<div style="padding-top:65px; /* for background image z-index: 10;*/" 
		 class="container">
		<div>
			@yield('content')
		</div>
	</div>
	@include('layouts.scripts')
	</body>
</html>