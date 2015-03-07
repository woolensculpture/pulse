<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Edit User Credentials</div>
		<p>Please ensure that <?php echo $user->email ?> is your correct email address as it will be used as a confirmation of your password change.</p>
		<?php echo validation_errors(); ?>
		<br>
		<?php
			$formConfig = array('id' => 'user_form');
			$passwordConfig = array('name' => 'password', 'id' => 'password', 'required' => 'required');
			$passwordConfirmationConfig = array('name' => 'passwordconfirm', 'id' => 'passwordconfirm', 'required' => 'required');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Password');
			
			// Show Form (Multipart for picture upload)
    		echo form_open_multipart('dj/saveUserCredentials', $formConfig);
			echo form_hidden('id', $user->id);
			echo form_hidden('username', $user->username);
			
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