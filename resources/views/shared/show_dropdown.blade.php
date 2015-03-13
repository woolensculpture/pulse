
<select name="{{ $name or 'show' }}">
	@foreach($shows as $show)
		<option value="{{ $show->id}}" {{ $value == $show->id ? 'selected' : '' }}>
			{{ $show->name }}
		</option>
	@endforeach
</select>