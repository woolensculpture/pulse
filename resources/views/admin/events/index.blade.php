@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
        <div class="header">Events
            <a class="header_button button" href="{{ route('admin.events.create') }}">New Event</a>
        </div>
		<ul>
			@foreach($events as $event)
				<li>
					<a href="{{ route('admin.events.edit', $event->id) }}"> {{ $event->name }} - {{ $event->date }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
