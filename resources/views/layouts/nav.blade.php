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

	<!--Pages exclusive to users
	@if(Auth::user())
	<li>
		<a href="/tasks">My Tasks</a>
	</li>

	<li>
		<a href='/tasks/create'>Create Task</a>
	</li>	

	<li>
		<a href="/logout">Log Out</a>
	</li>

	@endif-->
</ul>