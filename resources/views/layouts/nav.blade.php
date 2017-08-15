<ul class="nav nav-pill">
	<!--Pages exclusive to guests-->
	@if(Auth::guest())
	<li>
		<a href="/">Log In</a>
	</li>

	<li>
		<a href="/register">Register</a>
	</li>
	@endif

	<?php $user = Auth::user() ?>
	@if($user)
		@if($user->category == "Administrator")
		<li>
			<a href="/admin/users">Manage Users</a>
		</li>
		<li>
			<a href="/admin/rooms">Manage Rooms</a>
		</li>
		<li>
			<a href="/admin/cards">Manage Cards</a>
		</li>
		<li>
			<a href="/logout">Log Out</a>
		</li>
		@endif

		@if($user->category == "Housekeeping")
		<li>
			<a href="">[To Be Completed]Cleaning List</a>
		</li>
		<li>
			<a href="/logout">Log Out</a>
		</li>
		@endif

		@if($user->category == "Reception")
		<li>
			<a href="">[To Be Completed] Manage Patrons</a>
		</li>
		<li>
			<a href="">[To Be Completed] Manage Bookings</a>
		</li>
		<li>
			<a href="">[To Be Completed]Manage Cards</a>
		</li>
		<li>
			<a href="/logout">Log Out</a>
		</li>
		@endif

		@if($user->category == "Patron")
		<li>
			<a href="">[To Be Completed]Your Bookings</a>
		</li>
		<li>
			<a href="">[To Be Completed]Your Cards</a>
		</li>
		<li>
			<a href="/logout">Log Out</a>
		</li>
		@endif
	@endif
</ul>