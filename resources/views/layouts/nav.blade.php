<nav class="navbar navbar-default navbar-fixed-top">
	<a href="/">
		<p class="navbar-text" 
		   style="font-family:consolas; 
			   border:1px solid rgb(119,119,119); 
			   padding:0px 10px 0px 10px;
			   font-size:12pt;
		">
			   HOEL.ORG
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
		<a href="">
			<button class="btn btn-default navbar-btn">
				[To Be Completed]Your Bookings
			</button>
		</a>
		<a href="">
			<button class="btn btn-default navbar-btn">
				[To Be Completed]Your Cards
			</button>
		</a>
		<a href="/logout">
			<button class="btn btn-default navbar-btn">
				Log Out
			</button>
		</a>
		@endif
		<a href="/logout">
				<button class="btn navbar-btn btn-warning">Log Out</button>
		</a>
	@endif
	<a href="http://vhom.org/">
		<img class="navbar_icon" style="height:35px;float:right;margin-top:0.3%;margin-right:1%;" 
			 src="https://cdn3.iconfinder.com/data/icons/glypho-free/64/home-128.png"
			 alt="Check out my other projects">
	</a>
	<a href="https://github.com/spkvn/hoel">
		<img class="navbar_icon" style="height:35px;float:right;margin-top:0.3%;margin-right:1%" 
			 src="http://iconshow.me/media/images/ui/ios7-icons/png/128/social-github-outline.png"
			 alt="check this project out on github">
	</a>
</nav>