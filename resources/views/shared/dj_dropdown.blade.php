
<select name="{{ $name or 'dj' }}">
	@foreach($djs as $dj)
		<option value="{{ $dj->id }}" {{ $value == $dj->id ? 'selected' : '' }}>
			{{ $dj->name }}
		</option>
	@endforeach
</select>