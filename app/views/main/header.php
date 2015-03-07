<!DOCTYPE html>

<!--
This document and all those relating to it are property of WITR 89.7, Rochester Institute of Technology
Developer: John Phillip Betley
© 2011 WITR 89.7 | Rochester Institute of Technology
-->



<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<meta name="author" content="John Betley">

	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

	<link href="<?php echo base_url(); ?>static/img/favicon.ico" rel="shortcut icon">

	<link href="<?php echo base_url(); ?>static/css/reset.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>static/js/shadowbox/shadowbox.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>static/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>static/css/style.font.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>static/css/custom-theme/jquery-ui-1.8.14.custom.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>static/js/scripts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.tools.min.js"></script>
	
	
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

<div id="sitewrap">
	
	<!-- HEADER -->
	<div id="header">

		<div class="button_container">
			<?php echo $button_container; ?>
		</div>
		
		<!-- LOGO -->
		<a id="logo_link" href="<?php echo base_url(); ?>home">
	    	<img id="logo" src="<?php echo base_url(); ?>static/img/header/witr_logo.png" alt="WITR 89.7" class="border">
		</a>
		
		<div style="height: 140px"></div>
		
		<!-- NAVIGATION -->
		<ul id="nav">
			<li><a href="<?php echo base_url(); ?>shows">Shows &amp; Schedule</a>
				<ul class="sub_nav">
				    <li><a href="<?php echo base_url(); ?>shows/schedule">Full Schedule</a></li>
				    <li><a href="<?php echo base_url(); ?>shows/specialty">Specialty Shows</a></li>
				    <li><a href="<?php echo base_url(); ?>shows/pulse">The Pulse of Music</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>events">Events</a></li>
			<li><a href="<?php echo base_url(); ?>about">About</a>
				<!--
				<ul class="sub_nav">
				    <li><a href="/about/music">The Music</a></li>
				    <li><a href="/about/performances">Studio Performances</a></li>
				    <li><a href="/shows/witr">Past, Present, Future</a></li>
				</ul>
				-->
			</li>
			<li><a href="<?php echo base_url(); ?>hockey">Hockey</a></li>
			<li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
      		<li><a href="<?php echo base_url(); ?>askdestler">Ask Destler</a></li>
		</ul>

		<!-- OTHER -->
		<a id="player_link" href="" rel="#player_popup">
			<img id="music_player" src="<?php echo base_url(); ?>static/img/header/now_playing.png" alt="Music Player">
		</a>
		<div style="clear:both;"></div>
		
	</div>
