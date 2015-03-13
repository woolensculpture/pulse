@extends('layouts.master')

@section('content')
	<div id="home">
		<div id="sidebar">
			<div id="nowplaying" class="bordert"> 
				<h1 style="margin-bottom: -5px; color: white; font-size: 38px; letter-spacing: 1px;">NOW PLAYING</h1>
				<div style="margin-bottom: 13px; width: 175px; height: 5px; background-color: #0a71ac;"></div>
				<p style="margin-bottom: 5px; color: #f9ec33; font-size: 18px; letter-spacing: 1px; line-height: 18px; word-wrap: break-word;" id="nowplaying-artist"></p>
				<p style="margin-bottom: 11px; color: #f9ec33; font-size: 30px; letter-spacing: 2px; line-height: 26px; word-wrap: break-word; text-transform: uppercase;" id="nowplaying-title"></p>
				<div style="margin-bottom: 15px; width: 175px; height: 2px; background-color: #0a71ac;"></div>
				<a id="player_link" href="" rel="#player_popup">
					<div id="LLButton"></div>
				</a>
				<div style="height: 10px;"></div>
				<a id="LoggerLink" href="http://logger.witr.rit.edu/" target="_blank">VIEW ALL SONGS PLAYED</a>
			</div>
			<div id="newsocial">
				<a href="https://www.facebook.com/89.7WITR" target="none">
					<div id="newFacebook"></div>
				</a>
				<a href="https://twitter.com/witr897" target="none">
					<div id="newTwitter"></div>
				</a>
			</div>
			<div id="sidecontent" class="borderb">
				<div id="request" class="border">
					<div id="make">Make A Request</div>
					<p>(585) 475-2271 &nbsp; IM: WITRDJ</p>
					<hr class="white">
					<div style="padding: 0px 10px 0px 10px; text-align: left">
						<span style="color: #7bc1eb">Want to Promote your business on WITR? Email:</span>
						<a style="color: #f9ec33" href="mailto:business@witr.rit.edu">business@witr.rit.edu</a>
						</br></br>
						<span style="color: #7bc1eb">RIT Student interested in joining WITR? Email:</span>
						<a style="color: #f9ec33" href="mailto:mal@witr.rit.edu<">mal@witr.rit.edu</a>
					</div>
				</div>
				<hr class="black">
			    <h2 id="toptwenty_header">Top Twenty</h2>
			    <!-- Top Twenty -->
			</div>
		</div>
		
		<div id="home_primary" class="border">

			<!-- Slider -->
			
			<hr class="white">
			
			<!-- Video -->
			@include('home.partials.video')
			
			<div style="clear:both;"></div>
			
			<hr class="white">

			<!-- Albums -->

		</div>

@stop

@section('scripts')

	<script type="text/javascript" src="{{ secure_asset('js/shadowbox/shadowbox.js') }}"></script>
	<script type="text/javascript">
	
		var scroll;

		// Slider setup for the news feed
		$(document).ready(function(){
			scroll = $('.scrollable').scrollable({circular: true, speed: 600})
							.autoscroll({interval: 5000})
							.navigator()
							.data('scrollable');
							
			$('.albumreview:first').css("margin-right", "10px");

	        $.getJSON('https://witr.rit.edu/nowplaying.php', function(data) {
	            $('#nowplaying-artist').text(data.artist);
	            $('#nowplaying-title').text(data.title);
	        });
		});
		
		
		// Shadowbox setup used for the video
		Shadowbox.init({
			autoplay: true,
			language: 'en', 
			players: ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'],
			onOpen: function() {scroll.pause(); $('.message').hide();},
			onClose: function() {scroll.play(); $('.message').show();}
		});

	</script>

@stop