<nav class="navbar navbar-default navbar-fixed-top">
	<link href="{{URL::asset('css/nav.css')}}" type="text/css" rel="stylesheet">
	<a href="/">
		<p class="navbar-text kNavLogo" >
			   HOEL.VHOM.ORG
		</p>
	</a>
	<!--Pages exclusive to guests-->
	@if(Auth::guest())
		<a href="/">
			<button class="btn btn-primary">Log In</button>
		</a>
	<a href="/register">
		<button class="btn btn-default navbar-btn">Register</button>
	</a>
	@endif

	<?php $user = Auth::user() ?>
	@if($user)
		@if($user->category == "Administrator")
		<a href="/admin/users">
		<button class="btn btn-default navbar-btn">
			Manage Users
		</button>
		</a>

		<a href="/admin/rooms">
		<button class="btn btn-default navbar-btn">
			Manage Rooms
		</button>
		</a>
		
		<a href="/admin/cards">
			<button class="btn btn-default navbar-btn">
				Manage Cards
			</button>
		</a>

		<a href="/admin/bookings/">
			<button class="btn btn-default navbar-btn">
				Manage Bookings
			</button>
		</a>
		@endif

		@if($user->category == "Housekeeping")
		<a href="">
			<button class="btn btn-default navbar-btn">
				[To Be Completed]Cleaning List
			</button>
		</a>
		<a href="/logout">
			<button class="btn btn-default navbar-btn">
				Log Out
			</button>
		</a>
		@endif

		@if($user->category == "Reception")
		<a href="">
			<button class="btn btn-default navbar-btn">
				[To Be Completed] Manage Patrons
			</button>
		</a>
		<a href="">
			<button class="btn btn-default navbar-btn">
			[To Be Completed] Manage Bookings
			</button>
		</a>
		<a href="">
			<button class="btn btn-default navbar-btn">
				[To Be Completed]Manage Cards
			</button>
		</a>
		<a href="/logout">
			<button class="btn btn-default navbar-btn">
				Log Out
			</button>
		</a>
		@endif

		@if($user->category == "Patron")
		<a href="/dashboard">
			<button class="btn btn-default navbar-btn">
				Your Bookings
			</button>
		</a>
		<a href="">
			<button class="btn btn-default navbar-btn">
				[To Be Completed]Your Cards
			</button>
		</a>
		@endif
		<a href="/logout">
				<button class="btn navbar-btn btn-warning">Log Out</button>
		</a>
	@endif
	<a href="http://vhom.org/" class="kNavbar_link_icon">
		<img class="kNavbar_icon"
			 src="https://staffsunion.s3.amazonaws.com/greenpad/images/icon_home.png"
			 alt="Check out my other projects">
	</a>
	<a href="https://github.com/spkvn/hoel" class="kNavbar_link_icon">
		<img class="kNavbar_icon"
			 src="http://iconshow.me/media/images/ui/ios7-icons/png/128/social-github-outline.png"
			 alt="check this project out on github">
	</a>
</nav>