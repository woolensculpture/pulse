<div class="general_wrap border">
	<?php if ($show->id == 0): ?><p>Note: This will not immediately add a show to be scheduled. This starts the process to make a show active in the system.</p><br><?php endif; ?>
    <div class="listform">
		<?php
			$formConfig = array('id' => 'show_form');
			$nameConfig = array('name' => 'name', 'id' => 'name', 'required' => 'required', 'value' => $show->name);
			$descriptionConfig = array('name' => 'description', 'id' => 'description', 'value' => $show->description);
			$pictureConfig = array('name' => 'show_picture', 'id' => 'show_picture');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Show');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Show');
			
			// Show Form (Multipart for picture upload)
    		echo form_open_multipart('admin/save_show', $formConfig);
			echo form_hidden('id', $show->id);
			
			// Name Input
			echo form_label('Name: ', 'name');
			echo form_input($nameConfig);
			
			// Description Input
			echo form_label('Description: ', 'description');
			echo form_textarea($descriptionConfig);
			
			// Picture Upload
			echo form_label('Picture:  (Note: Pictures should be of size 150x150)', 'show_picture');
			echo form_upload($pictureConfig);
			
			if ($this->acl->can_write($this->role_id, Resource::Show)) {
				echo form_submit($submitConfig);
			}
			if ($this->acl->can_delete($this->role_id, Resource::Show)) {
				echo form_button($deleteConfig);
			}
			
			echo form_close();
		?>
    </div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
	
		// Deletion Ajax
		$('#delete').click(function() {
			var data = $('#show_form').serialize();
			
			$.post(
				'<?php echo base_url(); ?>admin/delete_show',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>admin/shows";
				}
			);
		});
		
	});
	
</script>