@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit DJ</h2>
		@include('shared.validation-messages')
		{!! Form::model($dj,['method' => 'put', 'route' => ['admin.djs.update', $dj->id], 'files' => true]) !!}
			<br>
			<div>
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name') !!}
			</div>
			<div>
				{!! Form::label('picture', 'Picture: (Note: Pictures should be of size 175x175)') !!}
				{!! Form::file('picture') !!}
			</div>
			{!! Form::submit('Update DJ') !!}
		{!! Form::close() !!}

		{!! Form::open(['method' => 'delete', 'route' => ['admin.djs.delete', $dj->id], 'class' => 'delete-form']) !!}
			{!! Form::submit('Delete DJ') !!}
		{!! Form::close() !!}
	</div>
</div>
@stop