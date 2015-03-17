@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Users</div>
		<ul>
			<li>
				<a href="{{ route('admin.users.create') }}">New User</a>
			</li>
			@foreach($users as $user)
				<li>
					<a href="{{ route('admin.users.edit', $user->id) }}"> {{ $user->name }}: {{ $user->dj_name }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop