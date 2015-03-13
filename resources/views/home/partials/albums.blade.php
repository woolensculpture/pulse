<div id="album_section">
    <div id="albumheader" class="header">Album Reviews:</div>
	<?php foreach($reviews as $row) : ?>
	<div class="albumreview border">
	    <img src="{{ secure_asset('img/albums/' . $row->img_name; ?>" alt="">
	    <h2><?php echo $row->band_name; ?>:</h2>
	    <h2><?php echo $row->album_name; ?></h2>
		<br>
	    <p>WITR REVIEW: <?php echo $row->review; ?></p>
	</div>
    <?php endforeach; ?>
    <div style="clear: both"></div>
</div>