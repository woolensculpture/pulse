<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Hockey: </div>
		<?php 
			$formConfig = array('id' => 'form');
			$opponentConfig = array('name' => 'opponent', 'required' => 'required', 'value' => $hockey->opponent);
			$dateConfig = array('name' => 'date', 'id' => 'date', 'required' => 'required', 'value' => $hockey->date);
			$timeConfig = array('name' => 'time', 'id' => 'time', 'required' => 'required', 'value' => $hockey->time);
			$locationConfig = array('name' => 'location', 'id' => 'location', 'required' => 'required', 'value' => $hockey->location);
			$opponentScore = array('name' => 'opponent_score', 'id' => 'opponent_score', 'value' => $hockey->opponent_score);
			$ritScore = array('name' => 'rit_score', 'id' => 'rit_score', 'value' => $hockey->rit_score);
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Game');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Game');
			$pictureConfig = array('name' => 'opponent_img');
			if ($hockey->id == 0) {
				$pictureConfig['required'] = 'required';
			}
		
			// Form Open
			echo form_open_multipart('hockey/save_game', $formConfig);
			echo form_hidden('id', $hockey->id);
			
			// Name Input
			echo form_label('Opponent Name: ', 'opponent');
			echo form_input($opponentConfig);

			$dateTime = strtotime($hockey->date);
			$time = strtotime($hockey->time, $dateTime);
			
			if ($hockey->id > 0 && ($dateTime < time() || ($dateTime = time() && $time <= time()))) {
				echo form_label('RIT Score: ', 'rit_score');
				echo form_input($ritScore);
				
				echo form_label('Opponent Score: ', 'opponent_score');
				echo form_input($opponentScore);
			}

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