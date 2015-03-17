@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Shows</div>
		<ul>
			<li>
				<a href="{{ route('admin.shows.create') }}">New Show</a>
			</li>
			@foreach($shows as $show)
				<li>
					<a href="{{ route('admin.shows.edit', $show->id) }}">{{ $show->name }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop