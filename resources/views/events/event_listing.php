<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Events:</div>
		<ul>
			<?php if ($this->acl->can_write($this->role_id, Resource::Event)) : ?>
			<li>
				<a href="<?php echo base_url(); ?>admin/<?php echo $url; ?>/0">New Event</a>
			</li>
			<?php endif; ?>
			<?php 
			if ($this->acl->can_modify($this->role_id, Resource::Event)) :
				foreach($events as $event) : 
					$date = strtotime($event->date);
					$event->date = date('m/d/Y', $date);?>
			
			<li>
				<a href="<?php echo base_url(); ?>admin/<?php echo $url; ?>/<?php echo $event->id ?>"><?php echo $event->name; ?> - <?php echo $event->date; ?></a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>