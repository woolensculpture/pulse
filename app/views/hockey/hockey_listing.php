<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Hockey Games:</div>
		<ul>
			<?php if ($this->acl->can_write($this->role_id, Resource::Hockey)) : ?>
			<li>
				<a href="<?php echo base_url(); ?>hockey/games/0">New Game</a>
			</li>
			<br>
			<?php 
			endif;
			
			if ($this->acl->can_modify($this->role_id, Resource::Hockey)) :
				echo "<li><h3>Upcoming Games:</h2></li>";
				foreach($hockey['future'] as $game) : 
					$date = strtotime($game->date);
					$game->date = date('m/d/Y', $date);?>
			
			<li>
				<a href="<?php echo base_url(); ?>hockey/games/<?php echo $game->id ?>"><?php echo "RIT vs. " . $game->opponent; ?> - <?php echo $game->date; ?></a>
			</li>
			<?php endforeach; ?>
			<br>
			<li><h3>Past Games:</h2></li>
			<?php foreach($hockey['past'] as $game) : 
					$date = strtotime($game->date);
					$game->date = date('m/d/Y', $date);?>
			
			<li>
				<a href="<?php echo base_url(); ?>hockey/games/<?php echo $game->id ?>"><?php echo "RIT vs. " . $game->opponent; ?> - <?php echo $game->date; ?></a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>