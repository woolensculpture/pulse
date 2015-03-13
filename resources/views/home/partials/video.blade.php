<div id="videosection">
    <h2 id="videoheading" class="header">Featured Music Video:</h2>
	
	    <a id="preview" rel="shadowbox;autoplay=true" href="https://www.youtube.com/v/{{ $video->url_tag }}&autoplay=1">
			<img id="videopic" src="https://img.youtube.com/vi/{{ $video->url_tag }}/0.jpg" alt="Featured Music Video">
		</a>
	
	<div id="videoinfo" class="border aside">
	    <h3>Artist: {{ $video->artist }}</h3>
	    <h3>Song: {{ $video->song }}</h3>
	    <h3>Album: {{ $video->album }}</h3>
		<br>
	    <p>WITR REVIEW: {{ $video->review }}</p>
	</div>
</div>