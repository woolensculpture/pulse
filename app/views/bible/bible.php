<style>
	td, th {
		padding-right: 15px;
	}
</style>

<div class="general_wrap border">
	<div class="header">Vinyl Library:</div>
	<?php
		$formConfig = array('id' => 'form');
		$artistConfig = array('name' => 'artist', 'id' => 'artist');
		$idConfig = array('name' => 'id', 'id' => 'id');
		$albumConfig = array('name' => 'album', 'id' => 'album');
		$findConfig = array('name' => 'submit', 'id' => 'submit', 'value' => 'Find');
		
		// Form Open
		echo form_open('dj/bible', $formConfig);
		
		// Artist Input
		echo form_label('Artist: ', 'artist');
		echo form_input($artistConfig);
		
		// Album Input
		echo form_label('Album: ', 'id');
		echo form_input($albumConfig);

		// ID Input
		echo form_label('ID: ', 'id');
		echo form_input($idConfig);
		
		echo form_submit($findConfig);
		
		echo form_close();
		
		if (isset($data)) :
			echo "<br><br><table>";
			echo "<tr><th>ID:</th><th>Artist:</th><th>Album</th></tr>";
			foreach ($data as $row) :
	?>
		<tr>
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->artist; ?></td>
			<td><?php echo $row->album; ?></td>
		</tr>
	<?php endforeach; echo "</table>"; endif; ?>
</div>
