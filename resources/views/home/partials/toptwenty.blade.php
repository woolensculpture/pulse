<ol id="toptwenty">
<?php foreach ($charts as $row): ?>
	<li><?php echo $row->artist . " - " . $row->title . "\n"; ?>
<?php endforeach; ?>
</ol>