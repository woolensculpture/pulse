@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
        <div class="header">E-Board
            <a class="header_button button" href="{{ route('admin.eboard.create') }}">New Position</a>
        </div>
		<ul>
			@foreach($eboard as $position)
				<li>
					<a href="{{ route('admin.eboard.edit', $position->id) }}"> {{ $position->position }} - {{ $position->name }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
