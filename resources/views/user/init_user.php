<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Create User Account</div>
		<?php echo validation_errors(); ?>
		<br>
		<?php
			$formConfig = array('id' => 'user_form');
			$usernameConfig = array('name' => 'username', 'id' => 'username', 'required' => 'required');
			$passwordConfig = array('name' => 'password', 'id' => 'password', 'required' => 'required');
			$passwordConfirmationConfig = array('name' => 'passwordconfirm', 'id' => 'passwordconfirm', 'required' => 'required');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Password');
			
			// Show Form (Multipart for picture upload)
    		echo form_open_multipart('dj/saveUserCredentials/1', $formConfig);
			echo form_hidden('id', $user->id);
			
			echo form_label('Username: ', 'username');
			echo form_input($usernameConfig);
			
			// Password Input
			echo form_label('New Password: ', 'password');
			echo form_password($passwordConfig);
			
			// Password Confirmation
			echo form_label('Confirm New Password: ', 'passwordconfirm');
			echo form_password($passwordConfirmationConfig);
			
			// Form Close
			echo form_submit($submitConfig);
			echo form_close();
		?>
	</div>
</div>