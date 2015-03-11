<?php
	foreach($djs as $dj) {
		$dj_array[$dj->id] = $dj->name;
	}
	
	foreach($shows as $show) {
		$show_array[$show->id] = $show->name;
	}
?>

		<div id="schedule_page">
			<div id="list_schedule" class="general_wrap border" style="margin: 0px">
				<ul class="tab_nav" style="padding-left: 40px">
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
				
				<hr style="color:white;background-color:white;width:97%">
				<?php echo form_open('admin/schedule_update', array('id' => 'schedule_form')); ?>
				<table class="schedule_table" id="sunday">
					<?php foreach($schedule['sunday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
		
				<table class="schedule_table" id="monday">
					<?php foreach($schedule['monday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
				
				<table class="schedule_table" id="tuesday">
					<?php foreach($schedule['tuesday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
				
				<table class="schedule_table" id="wednesday">
					<?php foreach($schedule['wednesday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
				
				<table class="schedule_table" id="thursday">
					<?php foreach($schedule['thursday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
				
				<table class="schedule_table" id="friday">
					<?php foreach($schedule['friday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
				
				<table class="schedule_table" id="saturday">
					<?php foreach($schedule['saturday'] as $row) : ?>
					<tr>
						<td>Time Block:</td>
						<td>Show:</td>
						<td>DJ:</td>
					</tr>
					<tr>
						<td><?php echo $row->show->getTime(); ?></td>
						<td><?php echo form_dropdown("show_" . $row->id, $show_array, $row->show->id ); ?></td>
					    <td><?php echo form_dropdown("dj_" . $row->id, $dj_array, $row->dj ); ?></td>
					</tr>
					<tr style="height: 15px"></tr>
					<?php endforeach; ?>
				</table>
				<?php if ($this->acl->can_publish($this->role_id, Resource::Schedule)) : ?>
				<input type="submit" name="submit" value="Submit" />
				<?php endif; ?>
				<?php echo form_close(); ?>
			</div>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#schedule_form').submit(function(event){

					event.preventDefault();

					var data = $(this).serialize();

					$.post('<?php echo base_url(); ?>admin/schedule_update', data, function() {
						alert('Schedule has been updated!');
					});

				});
				
				scheduleConfig();
			});
			
			function scheduleConfig() {
				var d=new Date();
				var weekday=new Array(7);
				weekday[0]="sunday";
				weekday[1]="monday";
				weekday[2]="tuesday";
				weekday[3]="wednesday";
				weekday[4]="thursday";
				weekday[5]="friday";
				weekday[6]="saturday";
				$('#list_schedule table.schedule_table').hide(); // Hide all divs
				$("#" + weekday[d.getDay()]).show(); // Show the first div
				var today = $('#list_schedule ul li a').get(d.getDay());
				$(today).addClass('selected'); // Set the class of the first link to active
				$('#list_schedule ul li a').click(function(){ //When any link is clicked
					$('.selected').removeClass('selected'); // Remove active class from all links
					$(this).addClass('selected'); //Set clicked link class to active
					var currentTab = $(this).attr('href'); // Set variable currentTab to value of href attribute of clicked link
					$('#list_schedule table.schedule_table').hide(); // Hide all divs
					$(currentTab).show(); // Show div with id equal to variable currentTab
					return false;
				});
			}
		</script>