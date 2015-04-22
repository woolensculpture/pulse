@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit Event</h2>
		@include('shared.validation-messages')
		{!! Form::model($event,['method' => 'put', 'route' => ['admin.events.update', $event->id], 'files' => true]) !!}
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
			{!! Form::submit('Update Event') !!}
		{!! Form::close() !!}

		{!! Form::open(['method' => 'delete', 'route' => ['admin.events.delete', $event->id], 'class' => 'delete-form']) !!}
			{!! Form::submit('Delete Event') !!}
		{!! Form::close() !!}
	</div>
</div>
@stop

@section('scripts')
<script>
  $(document).ready(function() {
	$('#date').datepicker();
  });
</script>
@stop