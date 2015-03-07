	<div class="general_wrap border">
		<div class="general_section">
			<div class="header">Upcoming Events</div>
			<ul class="horizontal_list">
				<?php foreach($events as $event) : ?>
				<li class="event_picture"><?php if ($event->description_page == 1) : ?><a href="<?php echo $event->url; ?>" style="color: white;"><?php endif; ?>
					<img class="event_picture border" src="<?php echo base_url(); ?>static/img/events/<?php echo $event->picture; ?>"/>
					<p class="event_caption">
						<?php 
							echo $event->name;
							echo "<br>";
							$date = strtotime($event->date);
							$event->date = date('m/d/Y', $date);
							echo $event->date;
							echo "<br>";
							if (isset($event->description)) {
								echo $event->description;
							}
						?></p>
					<?php if ($event->description_page == 1) : ?></a><?php endif; ?>
				</li>
				<?php endforeach; ?>
				<div style="clear: both" />
			</ul>
		</div>
	</div>
