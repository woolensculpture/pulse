	<div class="general_wrap border">
		<div class="header">The Pulse of Music On WITR</div>
		<div class="general_section white border padding">	
			<p>The Pulse of Music plays what’s relevant now, so you could hear just about anything over the course of the day. We take pride in the fact that you can hear indie rock, electro-pop, chillwave, garage rock, and some of you old favorites over the course of an hour. Have a favorite Pulse of Music DJ? Check them out below!</p>
			<div class="header white">Pulse of Music DJs:</div>
			<ul>
				<ul class="horizontal_list">
				<?php foreach($djs as $dj) : ?>
				<li>
					<img class="show_picture border" src="<?php echo base_url(); ?>static/img/djs/<?php echo $dj->picture ?>"/>
					<div class="show_description border black"><p>
						<?php echo $dj->dj_name;	?>
					</p></div>
				</li>
				<?php endforeach; ?>
				<div style="clear: both" />
			</ul>
		    <div style="clear:both"/>
			</ul>
		</div>
	</div>
