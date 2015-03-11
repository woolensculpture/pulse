<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Welcome to the DJ Page!</div>
		<ul>
			<?php if ($this->acl->can_modify($this->role_id, Resource::UserAccess)) : ?>
			<li><a href="<?php echo base_url() ?>dj/edit_user_info">Edit Your User/DJ Information</a></li>
			<li><a href="<?php echo base_url() ?>dj/edit_user_credentials">Change Your Password</a></li>
			<?php endif; 
			if ($this->acl->can_read($this->role_id, Resource::Hockey)) : ?>
			<li><a href="/hockey/games">Add/Edit Hockey Games</a></li>
	        <?php endif; ?>
		<li><a href="<?php echo base_url(); ?>dj/top">Weekly Charts</a></li>
	        <li><a href="<?php echo base_url(); ?>dj/listeners">Streaming Listeners</a></li>
	        <li><a href="<?php echo base_url(); ?>dj/bible">Vinyl Bible</a></li>
	        <li><a href="<?php echo base_url(); ?>dj/ticket">Support Ticket</a></li>
	        <!--<li><a href="<?php echo base_url(); ?>/recordings">Program Recordings</a></li>-->
	        <li><a href="<?php echo base_url(); ?>dj/get_file/bylaws.pdf">WITR Bylaws</a></li>
	        <li><a href="<?php echo base_url(); ?>dj/get_file/pandp.doc">Policies and Procedures</a></li>
	        <li><a href="<?php echo base_url(); ?>wiki/">WITR Wiki</a> <span style="margin-left: 10px; font-size: 10pt" class="clean_type">Username: wikiuser</span> <span style="margin-left: 10px; font-size: 10pt" class="clean_type">Password: W1k189.7</span></li>
	        <li><a href="https://docs.google.com/a/g.rit.edu/spreadsheet/viewform?fromEmail=true&formkey=dGU1S3pkU1NxTE10VnRaczZqOXhtS3c6MQ">Work Hours</a></li>
		</ul>
	</div>
</div>
