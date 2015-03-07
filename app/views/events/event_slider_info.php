<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Events: </div>
		<?php 
			$formConfig = array('id' => 'form');
			$nameConfig = array('name' => 'name', 'required' => 'required', 'value' => $event->name);
			$dateConfig = array('name' => 'date', 'id' => 'date', 'required' => 'required', 'value' => $event->date);
			$shortDescriptionConfig = array('name' => 'description', 'required' => 'required', 'value' => $event->description);
			$urlConfig = array('name' => 'url', 'value' => $event->url);
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save event');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Show');
			$pictureConfig = array('name' => 'picture');
			if ($event->id == 0) {
				$pictureConfig['required'] = 'required';
			}
		
			// Form Open
			echo form_open_multipart('admin/save_event', $formConfig);
			echo form_hidden('id', $event->id);
			echo form_hidden('type', 'SLIDER');
			
			// Name Input
			echo form_label('Event Name: ', 'name');
			echo form_input($nameConfig);

			// Date Input
			echo form_label('Event Date: ', 'date');
			echo form_input($dateConfig);

			// Date Input
			echo form_label('Event url: ', 'url');
			echo form_input($urlConfig);
			
			// Picture Input
			echo form_label('Event Picture: (Note: Pictures should be of size 670x344)', 'picture');
			echo form_upload($pictureConfig);
			
			// Form Close
			if ($this->acl->can_write($this->role_id, Resource::Event)) {
				echo form_submit($submitConfig);
			}
			if ($this->acl->can_delete($this->role_id, Resource::Event)) {
				echo form_button($deleteConfig);
			}
			echo form_close();
		?>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#date').datepicker();

		// Deletion Ajax
		$('#delete').click(function() {
			var data = $('#form').serialize();
			
			$.post(
				'<?php echo base_url(); ?>admin/delete_event',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>admin/slider";
				}
			);
		});

	});
</script>