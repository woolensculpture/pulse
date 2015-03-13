<div id="album_section">
    <div id="albumheader" class="header">Album Reviews:</div>
    @foreach ($albums as $review)
	<div class="albumreview border">
	    <img src="{{ secure_asset('img/albums/' . $review->img_name) }}" alt="">
	    <h2>{{ $review->band_name }}:</h2>
	    <h2>{{ $review->album_name }}</h2>
		<br>
	    <p>WITR REVIEW: {{ $review->review }}</p>
	</div>
	@endforeach
    <div style="clear: both"></div>
</div>