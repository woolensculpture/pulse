<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">User Resources:</div>
		<a href="<?php echo base_url(); ?>permissions/resources/0">New resource</a>
		<table>
			<tr>
				<th style="padding-right: 10px">ID:</th>
				<th style="padding-left: 10px;padding-right: 10px">Name:</th>
				<th style="padding-left: 10px;padding-right: 10px">Description:</th>
				<th style="padding-left: 10px;padding-right: 10px">Parent ID:</th>
			</tr>
			<?php foreach($resources as $resource) : ?>
			<tr>
				<td style="padding-right: 10px"><?php echo $resource->id; ?></td>
				<td style="padding-left: 10px;padding-right: 10px"><?php echo $resource->name; ?></td>
				<td style="padding-left: 10px;padding-right: 10px"><?php echo $resource->description; ?></td>
				<td style="padding-left: 10px;padding-right: 10px"><?php if ($resource->parentId == null) { echo "NONE"; } else { echo $resource->parentId;} ?></td>
				<td><a href="<?php echo base_url(); ?>permissions/resources/<?php echo $resource->id ?>">Edit</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>