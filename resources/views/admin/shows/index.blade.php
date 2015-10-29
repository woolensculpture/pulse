@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Shows
            <a class="header_button button" href="{{ route('admin.shows.create') }}">New Show</a>
        </div>
		<ul>
			@foreach($shows as $show)
				<li>
					<a href="{{ route('admin.shows.edit', $show->id) }}">{{ $show->name }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
