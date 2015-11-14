@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit User</h2>
		<br>
		<div>
			Name: {{ $user->name }}
		</div>
		<div>
			Email Address: {{ $user->email }}
		</div>

		{!! Form::open(['method' => 'delete', 'route' => ['admin.users.delete', $user->id], 'class' => 'delete-form']) !!}
			{!! Form::submit('Delete User') !!}
		{!! Form::close() !!}
	</div>
</div>
@stop