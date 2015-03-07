<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Edit User Information</div>
		<?php
			$formConfig = array('id' => 'user_form');
			$nameConfig = array('name' => 'name', 'id' => 'name', 'required' => 'required');
			$emailConfig = array('name' => 'email', 'id' => 'email', 'required' => 'required', 'type' => 'email');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save User');
			
			// User Form (Multipart for picture upload)
    		echo form_open('admin/save_user', $formConfig);
			echo form_hidden('id', $user->id);
			
			// Name Input
			echo form_label('Name: ', 'name');
			echo form_input($nameConfig);
			
			// Email Address Input
			echo form_label('Email Address: ', 'email');
			echo form_input($emailConfig);
			
			// Form Close
			echo form_submit($submitConfig);
			echo form_close();
		?>
	</div>
</div>
