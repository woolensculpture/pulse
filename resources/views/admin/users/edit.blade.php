@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit User</h2>
		@include('shared.validation-messages')
		{!! Form::model($user,['method' => 'put', 'route' => ['admin.users.update', $user->id]]) !!}
			<br>
			<div>
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name') !!}
			</div>
			<div>
				{!! Form::label('email', 'Email:') !!}
				{!! Form::text('email') !!}
			</div>
			{!! Form::submit('Update User') !!}
		{!! Form::close() !!}

		{!! Form::open(['method' => 'delete', 'route' => ['admin.users.delete', $user->id], 'class' => 'delete-form']) !!}
			{!! Form::submit('Delete User') !!}
		{!! Form::close() !!}
	</div>
</div>
@stop