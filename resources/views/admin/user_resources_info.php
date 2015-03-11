<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Resources: </div>
		<?php 
			$formConfig = array('id' => 'form');
			$nameConfig = array('name' => 'name', 'required' => 'required', 'value' => $resource->name);
			$descriptionConfig = array('name' => 'description', 'required' => 'required', 'value' => $resource->description);
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Resource');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Resource');
		
			// Form Open
			echo form_open('permissions/save_resource', $formConfig);
			echo form_hidden('id', $resource->id);
			
			// Name Input
			echo form_label('Resource Name: ', 'name');
			echo form_input($nameConfig);
			
			// Description Input
			echo form_label('Resource Description: ', 'description');
			echo form_input($descriptionConfig);
			
			echo form_label('Parent ID:', 'parentId');
			echo form_dropdown('parentId', $resources, ($resource->parentId == null) ? "" : $resource->parentId);
			
			echo "<br>";
			echo "<br>";
			
			// Form Close
			echo form_submit($submitConfig);
			echo form_button($deleteConfig);
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
				'<?php echo base_url(); ?>permissions/delete_resource',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>permissions/resources";
				}
			);
		});

	});
</script>