<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Shows:</div>
		<ul>
			<?php if ($this->acl->can_write($this->role_id, Resource::Show)) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/shows/0">New Show</a>
			</li>
			<?php endif; ?>
			<?php if ($this->acl->can_modify($this->role_id, Resource::Show)) : ?>
			<?php foreach($shows as $show) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/shows/<?php echo $show->id ?>"><?php echo $show->name ?></a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>