<ol id="toptwenty">
	@foreach($toptwenty as $song)
		<li>{{ $song->artist }} - {{ $song->title }}</li>
	@endforeach
</ol>