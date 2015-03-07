<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">ACL Permissions Administration:</div>
		<div id="permissions">
			<?php foreach ($permissions as $permission) {
				echo "<div class='permission_wrap'>";
			
				$formConfig = array('id' => 'permission' . $permission->id);
				
				echo form_open('', $formConfig);
				echo form_hidden('id', $permission->id);
				
				echo form_label('Permission:');
				echo form_input('description', $permission->description);
				
				echo form_label('Read:');
				echo form_checkbox('permissions[]', 'read', $permission->read);
				
				echo form_label('Write:');
				echo form_checkbox('permissions[]', 'write', $permission->write);
				
				echo form_label('Modify:');
				echo form_checkbox('permissions[]', 'modify', $permission->modify);
				
				echo form_label('Publish:');
				echo form_checkbox('permissions[]', 'publish', $permission->publish);
				
				echo form_label('Delete:');
				echo form_checkbox('permissions[]', 'delete', $permission->delete);
				
				echo "<br>";
				
				echo form_label('Role:');
				echo form_dropdown('role', $roles, $permission->role);
				
				echo form_label('Resource:');
				echo form_dropdown('resource', $resources, $permission->resource);
				
				echo form_button('delete', 'Delete', 'onClick="javascript:deletePermission(' . $permission->id . ')"');
				echo form_button('save', 'Save', 'onClick="javascript:savePermission(' . $permission->id . ')"');
				echo form_close();
				
				echo "<br><hr class=\"white\"><br>";
				echo "</div>";
			}?>
		</div>
		<div class="header">Create Permission</div>
		<?php
			echo "<div class='permission_wrap'>";
		
			echo form_open('permissions/permission/1');
			echo form_hidden('id', 0);
			
			echo form_label('Permission:');
			echo form_input('description');
			
			echo form_label('Read:');
			echo form_checkbox('permissions[]', 'read');
			
			echo form_label('Write:');
			echo form_checkbox('permissions[]', 'write');
			
			echo form_label('Modify:');
			echo form_checkbox('permissions[]', 'modify');
			
			echo form_label('Publish:');
			echo form_checkbox('permissions[]', 'publish');
			
			echo form_label('Delete:');
			echo form_checkbox('permissions[]', 'delete');
			
			echo "<br>";
			
			echo form_label('Role:');
			echo form_dropdown('role', $roles);
			
			echo form_label('Resource:');
			echo form_dropdown('resource', $resources);
			
			echo form_submit('submit', "Create Permission");
			echo form_close();
			
			echo "<br><br>";
			echo "</div>";
		?>
	</div>
</div>

<script>

	function savePermission(id) {
		var data = $('#permission' + id).serialize();
		console.log(data);
		
		$.post('<?php echo base_url(); ?>permissions/permission/1', data, function() {
			alert('Permission has been saved!');
		});
	}
	
	function deletePermission(id) {
		var section = $('#permission' + id);
		var data = section.serialize();
		var approve = confirm("Are you sure?");
		if (approve) {
			$.post('<?php echo base_url(); ?>permissions/permission/2', data, function() {
				alert('Permission has been deleted!');
			});
			
			section.parent().html('');
		}
	}
	
</script>