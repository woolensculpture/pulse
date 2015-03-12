<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Edit User Information</div>
		<?php
			$formConfig = array('id' => 'user_form');
			$nameConfig = array('name' => 'name', 'id' => 'name', 'required' => 'required', 'value' => $user->name);
			$djAliasConfig = array('name' => 'dj_name', 'id' => 'dj_name', 'required' => 'required', 'value' => $user->dj_name);
			$emailConfig = array('name' => 'email', 'id' => 'email', 'required' => 'required', 'value' => $user->email, 'type' => 'email');
			$descriptionConfig = array('name' => 'description', 'id' => 'description', 'value' => $user->description);
			$pictureConfig = array('name' => 'picture', 'id' => 'picture');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'class' => 'float_left',  'value' => 'Save User');
			$deleteConfig = array('name' => 'delete', 'class' => 'float_left', 'id' => 'delete', 'value' => 'Delete User');
			
			// User Form (Multipart for picture upload)
    		echo form_open_multipart('dj/saveUserInfo', $formConfig);
			echo form_hidden('id', $user->id);
			
			// Name Input
			echo form_label('Name: ', 'name');
			echo form_input($nameConfig);
			
			// DJ Alias Input
			echo form_label('DJ Alias: ', 'dj_name');
			echo form_input($djAliasConfig);
			
			// Email Address Input
			echo form_label('Email Address: ', 'email');
			echo form_input($emailConfig);
			
			// Description Input
			echo form_label('Description: ', 'description');
			echo form_textarea($descriptionConfig);
			
			// Picture Upload
			echo form_label('Picture:  (Note: Pictures should be of size 175x175)', 'picture_input');
			echo form_upload($pictureConfig);
			
			// Form Close
			echo form_submit($submitConfig);

			// Delete Button
			
			echo form_close();
			echo form_open('admin/delete_user');
			echo form_hidden('id', $user->id);
			if ($this->acl->can_delete($this->role_id, Resource::User) || $this->acl->can_delete($this->role_id, Resource::DJ)) {
				echo form_submit($deleteConfig);
			}
			echo form_close();
		?>
	<div class='clear_both'>
	</div>
	</div>
</div>
<script>
	$(document).ready(function() {

		// Deletion Ajax
		$('#delete').click(function() {
			var data = $('#form').serialize();
			
			$.post(
				'<?php echo base_url(); ?>admin/delete_user',
				data,
				function() {
					//window.location = "<?php echo base_url(); ?>admin/users";
				}
			);
		});

	});
</script>
