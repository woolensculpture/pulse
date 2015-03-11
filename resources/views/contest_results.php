<div class="general_wrap border">
	<div class="general_section">
		<div class="header">AFCU Contest Entries</div>
		<ul style="list-style: none">
			<?php foreach ($entries as $entry) :?>
			<li>
				<div style="float: left">
				<?php
					echo "Name: " . $entry->name . "<br />";
					echo "Email: " . $entry->email . "<br />";
					echo "Address: " . $entry->address . "<br />";
					echo "City: " . $entry->city . "<br />";
					echo "State: " . $entry->state . "<br />";
					echo "Zipcode: " . $entry->zipcode . "<br />";
					echo "Phone Number: " . $entry->phonenumber . "<br />";

				?>
				</div>
				<a style="float: right;" href="<?php echo base_url() . "static/img/contest/" . $entry->img; ?>"><img src="<?php echo base_url() . "static/img/contest/" . $entry->img; ?>" style="width: 130px; height: 130px;" /></a>
				<div style="clear: both" ></div>
				<hr class="white" />
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
