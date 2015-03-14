@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New Event</h2>
			{!! Form::open(array('route' => 'admin.events.create.save', 'files' => true)) !!}
				<br>
				<div>
					{!! Form::label('name', 'Event Name:') !!}
					{!! Form::text('name') !!}
  				</div>
	  			<div>
					{!! Form::label('date', 'Event Date:') !!}
          			{!! Form::text('date') !!}
				</div>
				<div>
					{!! Form::label('url', 'Event url:') !!}
					{!! Form::text('url') !!}
				</div>
				<div>
					{!! Form::label('picture', 'Event Image: (Note: Pictures should be of size 670x344)') !!}
					{!! Form::file('picture') !!}
				</div>
				<div>
					{!! Form::submit('Save Event') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop

@section('scripts')
<script>
	$(document).ready(function() {
		$('#date').datepicker();

	});
</script>
@stop