<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Album Reviews:</div>
		<ul>
			<?php if ($this->acl->can_write($this->role_id, Resource::Review)) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/reviews/0">New Album Review</a>
			</li>
			<?php endif; ?>
			<?php if ($this->acl->can_modify($this->role_id, Resource::Review)) : ?>
			<?php foreach($reviews as $review) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/reviews/<?php echo $review->id ?>"><?php echo $review->band_name; ?> - <?php echo $review->album_name; ?></a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>