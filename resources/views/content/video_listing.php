<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Featured Videos:</div>
		<ul>
			<?php if ($this->acl->can_write($this->role_id, Resource::Video)) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/video/0">New Album video</a>
			</li>
			<?php endif; ?>
			<?php if ($this->acl->can_modify($this->role_id, Resource::Video)) : ?>
			<?php foreach($videos as $video) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/video/<?php echo $video->id ?>"><?php echo $video->artist; ?> - <?php echo $video->song; ?></a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>