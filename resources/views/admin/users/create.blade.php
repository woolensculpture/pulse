@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New User</h2>
			{!! Form::open(array('route' => 'admin.users.create.save', 'files' => true)) !!}
				<br>
				<div>
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name') !!}
  				</div>
	  			<div>
					{!! Form::label('email', 'Email Address:') !!}
          			{!! Form::text('email') !!}
				</div>
				<div>
					{!! Form::submit('Save User') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop