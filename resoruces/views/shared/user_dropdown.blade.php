
<select name="{{ $name or 'user' }}">
	@foreach($users as $user)
		<option value="{{ $user->id}}" {{ $value == $user->id ? 'selected' : '' }}>
	@endforeach
</select>