@extends('layouts.master')

@section('content')
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
				<thead>
					<tr>
						<th>Artist</th>
						<th>Track</th>
						<th>Group</th>
						<th>Count</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tracks as $track)
						<tr>
							<td>{{ $track->artist }}</td>
							<td>{{ $track->title }}</td>
							<td>{{ $track->name }}</td>
							<td>{{ $track->count }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div> 


@stop