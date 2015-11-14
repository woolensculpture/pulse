@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
        <div class="header">Users
            <a class="header_button button" href="{{ route('admin.users.create') }}">New User</a>
        </div>
		<ul>
			@foreach($users as $user)
				<li>
					<a href="{{ route('admin.users.edit', $user->id) }}"> {{ $user->name }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
