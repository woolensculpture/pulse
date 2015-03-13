		<div class="border general_wrap">
			<div class="header">Win a $50.00 Advantage Federal Credit Union Visa gift card!</div>
			<hr class="white">
			<div id="form">
				
				<h4>Advantage Federal Credit Union and WITR are teaming up to give one lucky listener a $50.00 Visa gift card.</h4>
				<h4>To enter, submit your information below along with a picture of you in front of Advantage Federal Credit Union's RIT branch.</h4>

				<br />
				<div style="float: left">
				<?php
					echo form_open_multipart('contest/submit_entry', array('id' =>'contest_form'));

					echo form_label('Name: ', 'name');
					echo form_input('name');

					echo form_label('Email: ', 'email');
					echo form_input('email');

					echo form_label('Street Address: ', 'address');
					echo form_input('address');

					echo form_label('City: ', 'city');
					echo form_input('city');

					echo form_label('State: ', 'state');
					echo form_input('state');

					echo form_label('Zipcode: ', 'zipcode');
					echo form_input('zipcode');

					echo form_label('Phone Number: ', 'phonenumber');
					echo form_input('phonenumber');

					echo form_label('Picture: ', 'img');
					echo form_upload('img');

					echo form_submit('submit', 'Submit');
					echo form_close(); 
				?>
				</div>
				<a href="http://www.feefreeforme.com/"><img src="<?php echo base_url(); ?>static/img/afcu.jpg" style="display: block; height: 425px; width: 425px; margin-right: 70px; margin-top: 15px; float: right" /></a>
				<div style="clear: both" ></div>
				<br />
				<div style="font-size: 14px;">
					<a href="<?php echo base_url(); ?>static/WITR AFCU Contest Rules.doc">Official Rules and Conditions apply.</a>
					No purchase necessary. Must be 18 years of age or older.
				</div>
			</div>
			
		</div>
