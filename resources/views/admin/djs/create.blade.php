@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New DJ</h2>
		@include('shared.validation-messages')
		{!! Form::open(array('route' => 'admin.djs.create.save', 'files' => true)) !!}
			<br>
			<div>
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name') !!}
				</div>
	        <div>
				{!! Form::label('picture', 'Picture: (Note: Pictures should be of size 175x175)') !!}
				{!! Form::file('picture') !!}
	        </div>
			<div>
				{!! Form::submit('Save DJ') !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop