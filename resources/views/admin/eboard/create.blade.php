@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New Eboard Position</h2>
			{!! Form::open(array('route' => 'admin.eboard.create.save')) !!}
				<br>
				<div>
					{!! Form::label('position', 'Position:') !!}
					{!! Form::text('position') !!}
				</div>
	  		<div>
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name') !!}
				</div>
				<div>
					{!! Form::label('email', 'Email:') !!}
					{!! Form::text('email') !!}
				</div>
				<div>
					{!! Form::label('hours', 'Hours:') !!}
					{!! Form::text('hours') !!}
			  </div>
				<div>
					{!! Form::submit('Save Position') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop