<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Featured Video</div>
		<?php 
			$formConfig = array('id' => 'form');
			$artistConfig = array('name' => 'artist', 'required' => 'required', 'value' => $video->artist);
			$albumConfig = array('name' => 'album', 'required' => 'required', 'value' => $video->album);
			$reviewConfig = array('name' => 'review', 'required' => 'required', 'value' => $video->review);
			$songConfig = array('name' => 'song', 'required' => 'required', 'value' => $video->song);
			$urlTagConfig = array('name' => 'url_tag', 'required' => 'required', 'value' => $video->url_tag);
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Show');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Video');
			
		
			// Form Open
			echo form_open('admin/save_video', $formConfig);
			echo form_hidden('id', $video->id);
			
			// Band Name Input
			echo form_label('Artist: ', 'artist');
			echo form_input($artistConfig);

			// Album Name Input
			echo form_label('Album: ', 'album');
			echo form_input($albumConfig);
			
			// Song Input
			echo form_label('Song: ', 'song');
			echo form_input($songConfig);
			
			// URL Input
			echo form_label('URL Link Copy: ', 'url_tag');
			echo form_input($urlTagConfig);
			
			// Album Review Input
			echo form_label('Video Review', 'review');
			echo form_textarea($reviewConfig);
			
			// Form Close
			if ($this->acl->can_write($this->role_id, Resource::Video)) {
				echo form_submit($submitConfig);
			}
			if ($this->acl->can_delete($this->role_id, Resource::Video)) {
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
				'<?php echo base_url(); ?>admin/delete_video',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>admin/shows";
				}
			);
		});
		
	});
	
</script>