<html>
	<head>
		<title>
			Kevin's Hotel Proj
		</title>
		<!--Boostrap CDN-->
		<link rel="stylesheet" 
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		  crossorigin="anonymous">
	</head>

	<body>
	<div class="container">
		<div class="row">
			@include('layouts.nav')
		</div>
		<div>
			@yield('content')
		</div>
	</div>
	@include('layouts.scripts')
	</body>
</html>