		<div id="schedule_page">
			<div id="list_schedule">
				<ul class="tab_nav">
				    <li>
				        <a href="#sunday">Sunday</a>
				    </li>
				    <li>
				        <a href="#monday">Monday</a>
				    </li>
				    <li>
				        <a href="#tuesday">Tuesday</a>
				    </li>
				    <li>
				        <a href="#wednesday">Wednesday</a>
				    </li>
				    <li>
				        <a href="#thursday">Thursday</a>
				    </li>
				    <li>
				        <a href="#friday">Friday</a>
				    </li>
				    <li>
				        <a href="#saturday">Saturday</a>
				    </li>
				</ul>
		
				<ul class="daily_schedule" id="sunday">
					<?php foreach($schedule['sunday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
		
				<ul class="daily_schedule" id="monday">
					<?php foreach($schedule['monday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
		
				<ul class="daily_schedule" id="tuesday">
					<?php foreach($schedule['tuesday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
		
				<ul class="daily_schedule" id="wednesday">
					<?php foreach($schedule['wednesday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
		
				<ul class="daily_schedule" id="thursday">
					<?php foreach($schedule['thursday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
		
				<ul class="daily_schedule" id="friday">
					<?php foreach($schedule['friday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
		
				<ul class="daily_schedule" id="saturday">
					<?php foreach($schedule['saturday'] as $row) : ?>
					<li class="block">
					    <div class="block_time"><?php echo $row->show->getTime(); ?></div>
						<div class="show_details">
					    	<img src="<?php echo base_url(); ?>static/img/shows/<?php echo $row->show->picture; ?>" alt="WITR" />
					        <p>
					            <span><?php echo $row->show->name; ?> WITH <?php echo $row->dj_name; ?></span><br>
								<?php echo $row->show->description; ?>
					        </p>
							<img src="<?php echo base_url(); ?>static/img/djs/<?php echo $row->dj_picture; ?>" />
					    </div>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function(){
				var d=new Date();
				var weekday=new Array(7);
				weekday[0]="sunday";
				weekday[1]="monday";
				weekday[2]="tuesday";
				weekday[3]="wednesday";
				weekday[4]="thursday";
				weekday[5]="friday";
				weekday[6]="saturday";
				$('#list_schedule ul.daily_schedule').hide(); // Hide all divs
				$("#" + weekday[d.getDay()]).show(); // Show the first div
				var today = $('#list_schedule ul li a').get(d.getDay());
				$(today).addClass('selected'); // Set the class of the first link to active
				$('#list_schedule ul li a').click(function(){ //When any link is clicked
					$('.selected').removeClass('selected'); // Remove active class from all links
					$(this).addClass('selected'); //Set clicked link class to active
					var currentTab = $(this).attr('href'); // Set variable currentTab to value of href attribute of clicked link
					$('#list_schedule ul.daily_schedule').hide(); // Hide all divs
					$(currentTab).show(); // Show div with id equal to variable currentTab
					return false;
				});
			});
		</script>
		
		
		