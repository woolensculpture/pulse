<div class="border general_wrap">
	<div class="general_section">
	    <div class="header">Roles: </div>
		<?php 
			$formConfig = array('id' => 'form');
			$nameConfig = array('name' => 'name', 'required' => 'required', 'value' => $role->name);
			$descriptionConfig = array('name' => 'description', 'required' => 'required', 'value' => $role->description);
			$submitConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Save Role');
			$deleteConfig = array('name' => 'delete', 'id' => 'delete', 'content' => 'Delete Role');
		
			// Form Open
			echo form_open('permissions/save_role', $formConfig);
			echo form_hidden('id', $role->id);
			
			// Name Input
			echo form_label('Role Name: ', 'name');
			echo form_input($nameConfig);
			
			// Description Input
			echo form_label('Role Description: ', 'description');
			echo form_input($descriptionConfig);
			
			echo form_label('Parent ID:', 'parentId');
			echo form_dropdown('parentId', $roles, ($role->parentId == 0) ? NULL : $role->parentId);
			
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
				'<?php echo base_url(); ?>permissions/delete_role',
				data,
				function() {
					window.location = "<?php echo base_url(); ?>permissions/roles";
				}
			);
		});

	});
</script>