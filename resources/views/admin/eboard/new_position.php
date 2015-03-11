<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Add New Position</div>
		<hr>
		<h2>Add New Position</h2>
			<?php echo form_open('admin/new_eboard'); ?>
				<table class="new" cellspacing="0">
		  			<tr>
						<td>Position</td>
		        		<td>Name</td>
		        		<td>Email</td>
		        		<td>Hours</td>
		    		</tr>
			    	<tr>
						<td><?php echo form_input('position'); ?></td>
			        	<td><?php echo form_input('name'); ?></td>
			        	<td><?php echo form_input('email'); ?></td>
			        	<td><?php echo form_input('hours'); ?></td>
			   		</tr>
				</table>
			<?php 
			echo form_submit('save', 'Save'); 
			echo form_close();
			?>	
	</div>
</div>