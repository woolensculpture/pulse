@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Welcome to the DJ Page!</div>

		@include('shared.validation-messages')

		{!! Form::open(['route' => 'dj.support.create']) !!}
			<div>
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name') !!}
			</div>
  			<div>
				{!! Form::label('equipment', 'Piece of Equipment:') !!}
      			{!! Form::text('equipment') !!}
			</div>
			<div>
				{!! Form::label('issue', 'Issue:') !!}
				{!! Form::textarea('issue') !!}
			</div>
			<div>
				{!! Form::submit('Submit Ticket') !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop
