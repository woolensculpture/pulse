@if ($authenticated || $in_station)
	<a class="logout_button button" href="{{ route('dj.index') }}">DJ Menu</a>
@endif

@if ($authenticated)

	@if($user->hasRole('admin') || $user->hasRole('editor'))
		<a class="logout_button button" href="{{ route('admin.index') }}">Admin Menu</a>
	@endif
	<a class="logout_button button" href="{{ route('auth.logout') }}">Logout</a>
@endif

	