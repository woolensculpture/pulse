<!DOCTYPE html>

<!--
This document and all those relating to it are property of WITR 89.7, Rochester Institute of Technology
Developer: John Phillip Betley
© 2011-{{ date('Y') }} WITR 89.7 | Rochester Institute of Technology
-->


<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<meta name="author" content="John Betley, Eli Clampett">

	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

	<link href="{{ secure_asset('img/favicon.ico') }}" rel="shortcut icon">

	<link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ secure_asset('js/shadowbox/shadowbox.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ secure_asset('css/style.font.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ secure_asset('css/custom-theme/jquery-ui-1.8.14.custom.css') }}" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{ secure_asset('js/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('js/scripts.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('js/jquery.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('js/jquery.noty.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('js/noty.defaults.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('js/noty.theme.default.js') }}"></script>
	
	
	<title>WITR 89.7</title>
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-22818156-3']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</head>
<body>

@include('shared.messages')

<div id="sitewrap">
	
	<!-- HEADER -->
	<div id="header">

		<div class="button_container">
			@include('layouts.partials.auth-buttons')
		</div>
		
		<!-- LOGO -->
		<a id="logo_link" href="{{ route('home') }}">
	    	<img id="logo" src="{{ secure_asset('img/header/witr_logo.png') }}" alt="WITR 89.7" class="border">
		</a>
		
		<div style="height: 140px"></div>
		
		<!-- NAVIGATION -->
		<ul id="nav">
			<li><a href="{{ route('shows.index') }}">Shows &amp; Schedule</a>
				<ul class="sub_nav">
				    <li><a href="{{ route('shows.schedule') }}">Full Schedule</a></li>
				    <li><a href="{{ route('shows.specialty') }}">Specialty Shows</a></li>
				    <li><a href="{{ route('shows.pulse') }}">The Pulse of Music</a></li>
				</ul>
			</li>
			<li><a href="{{ route('about') }}">About</a>
				<!--
				<ul class="sub_nav">
				    <li><a href="/about/music">The Music</a></li>
				    <li><a href="/about/performances">Studio Performances</a></li>
				    <li><a href="/shows/witr">Past, Present, Future</a></li>
				</ul>
				-->
			</li>
			<li><a href="{{ route('hockey') }}">Hockey</a></li>
			<li><a href="{{ route('contact') }}">Contact</a></li>
      		<li><a href="{{ route('askdestler') }}">Ask Destler</a></li>
      		<li><a href="https://www.facebook.com/WITR897"><img src="{{ secure_asset('img/header/facebook.png') }}"></a></li>
      		<li><a href="https://www.twitter.com/WITR897"><img src="{{ secure_asset('img/header/twitter.png') }}"></a></li>
      		<li><a href="https://www.instagram.com/WITR897"><img src="{{ secure_asset('img/header/instagram.png') }}"></a></li>
		</ul>

		<!-- OTHER -->
		<a id="player_link" href="" rel="#player_popup">
			<img id="music_player" src="{{ secure_asset('img/header/now_playing.png') }}" alt="Music Player">
		</a>
		<div style="clear:both;"></div>
		
	</div>

	@yield('content')

	<div style="clear:both;"></div>
	<div id="player_popup" class="border">
		<a href="#" onclick="popitup('{{ route('listen') }}')">
		    <img src="{{ secure_asset('img/header/browser.gif') }}" alt="" style="margin-right: 10px"/>
		</a>
		<a href="{{ secure_asset('live.m3u') }}">
		    <img src="{{ secure_asset('img/header/computer.gif') }}" alt="" style="margin-right: 10px" />
		</a>
		<a href="{{ secure_asset('2nd.m3u') }}">
			<img src="{{ secure_asset('img/header/womens.png') }}" alt="" />
		</a>
	</div>
	<div id="copyright">&copy; 2011 -  {{ date('Y') }} WITR 89.7 | Rochester Institute of Technology</div>
</div>

<script language="javascript" type="text/javascript">
<!--

function popitup(url) {
	newwindow = window.open(url,'name','height=265,width=560');
	if (window.focus) {
		newwindow.focus();
	}
	return false;
}

// -->
</script>

@yield('scripts')

</body>
</html>

