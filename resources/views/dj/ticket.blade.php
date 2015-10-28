@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Help! Something Broke.</div>

		@include('shared.validation-messages')

		{!! Form::open(['route' => 'dj.support.create']) !!}
			<div>
				{!! Form::label('name', 'Your Name:') !!}
				{!! Form::text('name') !!}
			</div>
  			<div>
				{!! Form::label('equipment', 'Piece of Equipment:') !!}
      			{!! Form::text('equipment') !!}
			</div>
			<div>
				{!! Form::label('issue', 'Issue:') !!}
				{!! Form::textarea('issue', null, array('placeholder' => 'Please include the location (if applicable) and enough details to help Engineering fix this for you! Also include your email address if you\'d like further correspondence.')) !!}
			</div>
			<div>
				{!! Form::submit('Submit Ticket') !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop
