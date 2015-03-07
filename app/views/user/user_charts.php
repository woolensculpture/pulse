<style type="text/css">
	
	
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
	</style>
<div class="general_wrap border">
        <div class="general_section">
		<div class="header">Weekly Charts</div>
			<table class="clean_type">
				<tbody>
				<tr>
				<th>Artist</th><th>Track</th><th>Group</th><th>Count</th></tr>
				<?php foreach($tracks as $track) : ?>
				<tr><td><?php echo $track->artist; ?></td>
				<td><?php echo $track->title; ?></td>
				<td><?php echo $track->name; ?></td>
				<td><?php echo $track->count; ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		</div> 
