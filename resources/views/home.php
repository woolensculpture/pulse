
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
						<span style="color: #7bc1eb">Want to Promote your business on WITR? Email:</span> <a style="color: #f9ec33" href="mailto:business@witr.rit.edu">business@witr.rit.edu</a> </br></br>
						<span style="color: #7bc1eb">RIT Student interested in joining WITR? Email:</span> <a style="color: #f9ec33" href="mailto:mal@witr.rit.edu<">mal@witr.rit.edu</a>
					</div>
				</div>
				<hr class="black">
				<!--<a class="border" id="blogref" href="/blogs">
					<img class="border" id="blogimg" src="<?php echo base_url(); ?>static/img/blog.jpg" alt="DJ Blogs">
				</a>-->
			    <h2 id="toptwenty_header">Top Twenty</h2>
			    <ol id="toptwenty">
				<?php foreach ($charts as $row): ?>
					<li><?php echo $row->artist . " - " . $row->title . "\n"; ?>
				<?php endforeach; ?>
			    </ol>
			</div>
		</div>
		
		<div id="home_primary" class="border">

			<div id="news" class="scrollable">
			    <ul class="items">
			    	<?php foreach($slider as $show) :?>
			        <li id="<?php $print = $show->type !== 'SLIDER' ? $show->type : 'fourth'; 
			        		echo $print;?>">
			            <?php if ($show->type !== 'SLIDER') : ?>
			            <!--<a href="#">-->
					        <div class="message" style="<?php echo $show->show->style; ?>"><?php echo $show->message; ?></span></div>
					        <div style="position: absolute;"><img class="newsimg border" src="<?php echo base_url(); ?>static/img/slider/<?php echo $show->show->slider_picture ?>"></div>
					    <!--</a>-->
					    <?php endif; ?>
					    <?php if ($show->type === 'SLIDER') : ?>
					    	<div style="position: absolute;">
					    		<?php if ($show->url !== null) : ?>
					    		<a href='<?php echo $show->url; ?>'>
					    		<img class="newsimg border" src="<?php echo base_url(); ?>static/img/events/<?php echo $show->picture ?>">
					    		</a> 
					    		<?php else: ?> <img class="newsimg border" src="<?php echo base_url(); ?>static/img/events/<?php echo $show->picture ?>"> <?php endif; ?>
					    	</div>
					    <?php endif; ?>
			        </li>
			        <?php endforeach; ?>
			    </ul>
			    <div style="clear:both;"></div>
			    <div class="navi">
			    	<div href="#first" class="border white"></div>
			    	<div href="#second" class="border white"></div>
			    	<div href="#third" class="border white"></div>
			    	<div href="#fourth" class="border white"></div>
			    </div>
			</div>
			
			<hr class="white">
			
			<div id="videosection">
			    <h2 id="videoheading" class="header">Featured Music Video:</h2>
				
				    <a id="preview" rel="shadowbox;autoplay=true" href="https://www.youtube.com/v/<?php echo $video->url_tag; ?>&autoplay=1">
						<img id="videopic" src="https://img.youtube.com/vi/<?php echo $video->url_tag; ?>/0.jpg" alt="Featured Music Video">
					</a>
				
				<div id="videoinfo" class="border aside">
				    <h3>Artist: <?php echo $video->artist; ?></h3>
				    <h3>Song: <?php echo $video->song; ?></h3>
				    <h3>Album: <?php echo $video->album; ?></h3>
					<br>
				    <p>WITR REVIEW: <?php echo $video->review; ?></p>
				</div>
			</div>
			
			<div style="clear:both;"></div>
			
			<hr class="white">

			<div id="album_section">
			    <div id="albumheader" class="header">Album Reviews:</div>
				<?php foreach($reviews as $row) : ?>
				<div class="albumreview border">
				    <img src="<?php echo base_url(); ?>static/img/albums/<?php echo $row->img_name; ?>" alt="">
				    <h2><?php echo $row->band_name; ?>:</h2>
				    <h2><?php echo $row->album_name; ?></h2>
					<br>
				    <p>WITR REVIEW: <?php echo $row->review; ?></p>
				</div>
			    <?php endforeach; ?>
			    <div style="clear: both"></div>
			</div>

		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/js/shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
		<!--
		
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

		-->
		</script>
		
	
