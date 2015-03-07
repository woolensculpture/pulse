<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Events: </div>
		<?php 
			$formConfig = array('id' => 'form');
			$nameConfig = array('name' => 'name', 'required' => 'required');
			$equipmentConfig = array('name' => 'equipment', 'id' => 'equipment', 'required' => 'required');
			$issueConfig = array('name' => 'issue', 'id' => 'issue', 'required' => 'required');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Send Ticket');

			// Form Open
			echo form_open('dj/ticket', $formConfig);
			
			// Name Input
			echo form_label('Name: ', 'name');
			echo form_input($nameConfig);

			// Equipment Input
			echo form_label('Piece of Equipment: ', 'equipment');
			echo form_input($equipmentConfig);

			// Issue Input
			echo form_label('Issue: ', 'issue');
			echo form_textarea($issueConfig);

			echo form_submit($submitConfig);

			echo form_close();
		?>
	</div>
</div>