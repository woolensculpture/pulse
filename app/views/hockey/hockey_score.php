<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Hockey: </div>
		<?php 
			$formConfig = array('id' => 'form');
			$opponentScore = array('name' => 'opponent_score', 'id' => 'opponent_score');
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Game');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Game');
		
			// Form Open
			echo form_open_multipart('hockey/save_game', $formConfig);
			echo form_hidden('id', $hockey->id);
			
			// Name Input
			echo form_label('Opponent Name: ', 'opponent');
			echo form_input($opponentConfig);
			
			// Name Input
			echo form_label('Location: ', 'location');
			echo form_input($locationConfig);

			// Date Input
			echo form_label('Game Date: ', 'date');
			echo form_input($dateConfig);
			
			// Time Input
			echo form_label('Game Time: (Format: HH:MM:SS in 24H Time)', 'time');
			echo form_input($timeConfig);
			
			
			// Picture Input
			echo form_label('Opponent Picture:', 'opponent_img');
			echo form_upload($pictureConfig);
			
			
			// Form Close
			if ($this->acl->can_write($this->role_id, Resource::Hockey)) {
				echo form_submit($submitConfig);
			}
			if ($this->acl->can_delete($this->role_id, Resource::Hockey)) {
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
				'<?php echo base_url(); ?>hockey/delete_hockey',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>hockey/games";
				}
			);
		});

	});
</script>