@extends('layouts.master')

@section('content')
<meta http-equiv="refresh" content="60; url={{ route('dj.listeners', ['studio' => $studio]) }}" />
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
<div id="this" class="general_wrap border">
	

	<h2>Secret Admirers: {{ $listeners->count() }}</h2>

	@foreach ($listeners->getMounts() as $mount)

		<table class="clean_type">
			@if($listeners->forMount($mount)->isEmpty())
				<h3>No Listeners on {{ $mount }}</h3><br>
			@else
				<h3>Listeners on {{ $mount }}: {{ $listeners->forMount($mount)->count() }}</h3>
				<tr>
					<th>Hostname:</th>
					<th width="80px">Minutes:</th>
					<th>Software:</th>
				</tr>
			@endif

			@foreach ($listeners->forMount($mount) as $listener)
				<tr>
					<td>{{ $listener->hostname }}</td>
					<td>{{ $listener->minutesConnected }}</td>
					<td>{{ $listener->userAgent }}</td>
				</tr>
			@endforeach
		</table>
		<br><br>

	@endforeach

</div>
@stop
