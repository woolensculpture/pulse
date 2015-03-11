<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Users:</div>
		<ul>
			<?php if ($this->acl->can_write($this->role_id, Resource::User) || $this->acl->can_write($this->role_id, Resource::DJ)) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/users/0">New User</a>
			</li>
			<?php endif; ?>
			<?php if ($this->acl->can_modify($this->role_id, Resource::User) || $this->acl->can_modify($this->role_id, Resource::DJ)) : ?>
			<?php foreach($users as $user) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/users/<?php echo $user->id ?>"><?php echo $user->name . ": " . $user->dj_name ?></a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>
