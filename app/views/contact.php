		<div id="contact" class="border general_wrap">
			<div class="header">Contacts</div>
			<hr class="white">
		
			<div id="contact_items">
			    <img class="border" src="<?php echo base_url(); ?>static/img/contact/eboard.png" alt="Executive Board" />
			    <img id="center_contact" class="border" src="<?php echo base_url(); ?>static/img/contact/home.png" alt="WITR Radio 32 Lomb Memorial Drive Rochester, NY 14623-0563" />
			    <img class="border" src="<?php echo base_url(); ?>static/img/contact/request.png" alt="Request Line: (585)475-2271 Office Line: (585) 475-2000" />
			</div>
			<div id="divider">
			    <img src="<?php echo base_url(); ?>static/img/contact/divider.png" alt="" id="divider_img" />
			</div>
			<div id="eboard_wrap" class="border">
			    <ul id="eboard" class="border">
					<?php foreach($eboard as $row) : ?>
					<li id="eboard_member">
				    	<div class="position"><?php echo $row->position; ?></div>
				    	<ul class="eboard_info">
				    	    <li class="eboard_name"><?php echo $row->name; ?></li>
				    	    <li class="eboard_email"><?php echo $row->email; ?></li>
				    	    <li class="eboard_hours"><?php echo $row->hours; ?></li>
				    	</ul>
	    			    <div style="clear:both"/>
					</li>
				    <div style="clear:both"/>
					<?php endforeach; ?>
			    </ul>
			</div>
		</div>

