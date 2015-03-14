@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Events</div>
		<ul>
			<li>
				<a href="{{ route('admin.events.create') }}">New Event</a>
			</li>
			@foreach($events as $event)
				<li>
					<a href="{{ route('admin.events.edit', $event->id) }}"> {{ $event->name }} - {{ $event->date }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop