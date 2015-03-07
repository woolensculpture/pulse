<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">User Roles:</div>
		<a href="<?php echo base_url(); ?>permissions/roles/0">New Role</a>
		<table>
			<tr>
				<th style="padding-right: 10px">ID:</th>
				<th style="padding-left: 10px;padding-right: 10px">Name:</th>
				<th style="padding-left: 10px;padding-right: 10px">Description:</th>
				<th style="padding-left: 10px;padding-right: 10px">Parent ID:</th>
			</tr>
			<?php foreach($roles as $role) : ?>
			<tr>
				<td style="padding-right: 10px"><?php echo $role->id; ?></td>
				<td style="padding-left: 10px;padding-right: 10px"><?php echo $role->name; ?></td>
				<td style="padding-left: 10px;padding-right: 10px"><?php echo $role->description; ?></td>
				<td style="padding-left: 10px;padding-right: 10px"><?php if ($role->parentId == null) { echo "NONE"; } else { echo $role->parentId;} ?></td>
				<td><a href="<?php echo base_url(); ?>permissions/roles/<?php echo $role->id ?>">Edit</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>