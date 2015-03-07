<style>
.new input {
	width: 180px;
	margin-right: 13px;
}
</style>

<div id="eboard_update_form" class="border general_wrap">
	<a class="admin_button button" href="/admin">Admin Screen</a>
	<h1>Executive Board</h1>

	<?php echo form_open('admin/eboard_update', array('id' => 'eboard_form')) ?>
	<?php foreach ($eboard as $row) : ?>
		<h4><?php echo $row->position; ?></h4>
		<table class="eboard_form_table" cellspacing="0">
		    <tr>
		        <td>Name</td>
		        <td>Email</td>
		        <td>Hours</td>
		    </tr>
		    <tr>
		        <td><?php echo form_input($row->id . '_name', $row->name); ?></td>
		        <td><?php echo form_input($row->id . '_email', $row->email); ?></td>
		        <td><?php echo form_input($row->id . '_hours', $row->hours); ?></td>
		    </tr>
		</table>
	<?php 
		endforeach;
		if ($this->acl->can_publish($this->role_id, Resource::Eboard)) {
			echo form_submit('submit', 'Submit');
		}
		echo form_close(); 
	?>
	<hr>
	<h2>Add New Position</h2>
	<?php echo form_open('admin/new_eboard'); ?>
	<table class="new" cellspacing="0">
		    <tr>
			<td>Position</td>
		        <td>Name</td>
		        <td>Email</td>
		        <td>Hours</td>
		    </tr>
		    <tr>
			<td><?php echo form_input('position'); ?></td>
		        <td><?php echo form_input('name'); ?></td>
		        <td><?php echo form_input('email'); ?></td>
		        <td><?php echo form_input('hours'); ?></td>
		    </tr>
		</table>
	<?php 
		echo form_submit('save', 'Save'); 
		echo form_close();
	?>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#eboard_form').submit(function(event){

			event.preventDefault();

			var data = $(this).serialize();

			$.post('../admin/eboard_update', data, function() {
				alert('Eboard has been updated!');
			});
		});
		
	});
	
</script>
