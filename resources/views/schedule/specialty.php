	<div class="general_wrap border">
		<div class="general_section">
			<div class="header">WITR Shows</div>
			<ul class="horizontal_list">
				<?php foreach($shows as $show) : ?>
				<li>
					<img class="show_picture border" src="<?php echo base_url(); ?>static/img/shows/<?php echo $show->picture; ?>"/>
					<div class="show_description border white"><p>
						<?php 
							echo $show->name;
							if ($show->description != '' && strlen($show->description) < 25 && $show->description != NULL) {
								echo " - " . $show->description;
							} 
						?>
					</p></div>
				</li>
				<?php endforeach; ?>
				<div style="clear: both" />
			</ul>
		</div>
	</div>