<meta http-equiv="refresh" content="60; url=<?php echo base_url(); ?>dj/listeners" />
<div id="this" class="general_wrap border">
	<style type="text/css">
	<!--
	
	table {
		padding: 0px;
		margin: 0px;
		color: white;
	}
	table td {
	    padding: 2px;
		font-size: 10pt;
		border: 1px solid;
		text-align: left;
	}
	-->
	</style>

<h2>Secret Admirers:<!--Total Listeners:--> <?php 
	$total = 0;
	foreach ($xml as $icecast) {
		$total += $icecast->source->Listeners;
	}
	echo $total;
	?>
</h2>
<?php foreach ($xml as $icecast) :
	if ($icecast->source->Listeners == 0) {
		echo "<h3>No Listeners on " . $icecast->source->attributes()->mount . "</h3><br>";
	}
	if ($icecast->source->Listeners != 0) : ?>
<table class="clean_type">
<h3><?php echo "Listeners on " . $icecast->source->attributes()->mount . ": " . $icecast->source->Listeners; ?></h3>
<tr>
	<th>Hostname:</th>
	<th width="80px">Minutes:</th>
	<th>Software:</th>
</tr>
<?php

foreach ($icecast->source->listener as $listener) {
	echo "<tr>";
	echo "<td>" . gethostbyaddr($listener->IP) . "</td>";
	echo "<td>" . round($listener->Connected / 60) . "</td>";
	echo "<td>" . $listener->UserAgent . "</td>";
	echo "</tr>";
}

?>
	
</table>
<br><br>
<?php endif; endforeach; ?>

</div>
