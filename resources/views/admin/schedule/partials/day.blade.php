<tr>
	<td>Time Block:</td>
	<td>Show:</td>
	<td>DJ:</td>
</tr>
<tr>
	<td>{{ $show->timespan() }}</td>
					
    <td>
    	@include('shared.show_dropdown', ['name' => 'show_' . $show->id(), 'value' => $show->showId()])
	</td>
    <td>
    	@include('shared.user_dropdown', ['name' => 'user_' . $show->id(), 'value' => $show->djId()])
	</td>
</tr>
<tr style="height: 15px"></tr>