<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Users:</div>
		<div>
			<?php if ($this->acl->can_modify($this->role_id, Resource::User) || $this->acl->can_modify($this->role_id, Resource::DJ)) : ?>
			<?php foreach($users as $user) : ?>
			<div class="role_wrap">
				<?php 
					$formConfig = array('id' => 'role' . $user->id);
				
					echo form_open('', $formConfig);
					echo "<p>" . $user->name . "</p>";
					echo form_hidden('id', $user->id);
					echo form_dropdown('role', $roles, $user->user_role);
					echo form_button('save', 'Save Role', 'onClick="saveRole('.$user->id.')"');
					echo form_close();
					echo "<br>";
				?>
				
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>

	function saveRole(id) {
		var data = $('#role' + id).serialize();
		console.log(data);
		
		$.post('<?php echo base_url(); ?>permissions/save_user_role', data, function() {
			alert('Permission has been saved!');
		});
	}
	
</script>