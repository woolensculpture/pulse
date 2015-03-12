<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Album Reviews</div>
		<?php 
			$formConfig = array('id' => 'form');
			$bandNameConfig = array('name' => 'band_name', 'required' => 'required', 'value' => $review->band_name);
			$albumNameConfig = array('name' => 'album_name', 'required' => 'required', 'value' => $review->album_name);
			$reviewConfig = array('name' => 'review', 'required' => 'required', 'value' => $review->review);
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Review');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Show');
			$imgNameConfig = array('name' => 'img_name');
			if ($review->id == 0) {
				$imgNameConfig['required'] = 'required';
			}
		
			// Form Open
			echo form_open_multipart('admin/save_review', $formConfig);
			echo form_hidden('id', $review->id);
			
			// Band Name Input
			echo form_label('Band Name: ', 'band_name');
			echo form_input($bandNameConfig);

			// Album Name Input
			echo form_label('Album Name: ', 'album_name');
			echo form_input($albumNameConfig);
			
			// Album Picture Input
			echo form_label('Album Picture: (Note: Pictures should be of size 310x310)', 'img_name');
			echo form_upload($imgNameConfig);
			
			// Album Review Input
			echo form_label('Album Review', 'review');
			echo form_textarea($reviewConfig);
			
			// Form Close
			if ($this->acl->can_write($this->role_id, Resource::Review)) {
				echo form_submit($submitConfig);
			}
			if ($this->acl->can_delete($this->role_id, Resource::Review)) {
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
			var data = $('#form').serialize();
			
			$.post(
				'<?php echo base_url(); ?>admin/delete_review',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>admin/reviews";
				}
			);
		});
		
	});
	
</script>