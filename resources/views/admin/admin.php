<div class="border general_wrap">
	<?php if ($this->acl->can_read($this->role_id, Resource::System)) : ?>
	<div class="admin_section">
	    <h2>Admin</h2>
	    <ul>
	        <li><a href="/admin/eboard/eboard">Change Eboard</a></li>
	        <li><a href="/admin/eboard/new_position">Add New Position</a></li>
	        <?php if ($this->acl->can_read($this->role_id, Resource::Permissions)) : ?>
	        <li><a href="<?php echo base_url(); ?>permissions/roles">Role Administration</a></li>
			<li><a href="<?php echo base_url(); ?>permissions/resources">Resource Administration</a></li>
			<li><a href="<?php echo base_url(); ?>permissions/permission">Permissions Administration</a></li>
			<li><a href="<?php echo base_url(); ?>permissions/user_roles">Assign User Roles</a></li>
			<?php endif; ?>
	    </ul>
	</div>
	<?php endif; ?>
	<?php if ($this->acl->can_read($this->role_id, Resource::Programming)) : ?>
	<div class="admin_section">
	    <h2>Shows &amp; Schedule</h2>
	    <ul>
	    	<?php if ( $this->acl->can_read($this->role_id, Resource::Schedule) ) : ?>
	        <li>
	            <a href="/admin/schedule">Edit Schedule</a>
	        </li>
	        <?php endif; ?>
	        <?php if ( $this->acl->can_read($this->role_id, Resource::Show) ) : ?> 
	        <li>
	            <a href="/admin/shows">Add/Edit Shows</a>
	        </li>
	        <?php endif; ?>
	    </ul>
	</div>
	<?php endif; ?>
	<?php if ($this->acl->can_read($this->role_id, Resource::Development)) : ?>
	<div class="admin_section">
	    <h2>Events</h2>
	    <ul>
	    	<?php if ($this->acl->can_read($this->role_id, Resource::Event)) : ?>
	        <li>
	            <a href="/admin/events">Add/Edit Events</a>
	        </li>
	        <li>
	            <a href="/admin/slider">Promote Events to Front Page</a>
	        </li>
	        <li>
	            <a href="/hockey/games">Add/Edit Hockey Games</a>
	        </li>
	        <?php endif; ?>
	    </ul>
	</div>
	<?php endif; ?>
	<?php if ($this->acl->can_read($this->role_id, Resource::DJ) || $this->acl->can_read($this->role_id, Resource::User)) : ?>
	<div class="admin_section">
	    <h2>DJs/Users</h2>
	    <ul>
	        <li>
	            <a href="/admin/users">Add/Edit DJs/Users</a>
	        </li>
	    </ul>
	</div>
	<?php endif; ?>
	<?php if ($this->acl->can_read($this->role_id, Resource::Development)) : ?>
	<div class="admin_section">
	    <h2>Content</h2>
	    <ul>
	    	<?php if ($this->acl->can_read($this->role_id, Resource::Review)) : ?>
	        <li>
	            <a href="/admin/reviews">Album Reviews</a>
	        </li>
	        <?php endif; ?>
	        <?php if ($this->acl->can_read($this->role_id, Resource::Video)) : ?>
			<li>
			    <a href="/admin/video">Featured Video</a>
			</li>
			<?php endif; ?>
			<?php if ($this->acl->can_read($this->role_id, Resource::Chart)) : ?>
		<li>
		    <a href="/contest/view_entries">AFCU Contest Entries</a>
		<li>
	        <?php endif; ?>
	    </ul>
	</div>
	<?php endif; ?>
</div>
