@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
		<div class="header">Featured Videos</div>
		<ul>
			<li>
				<a href="{{ route('admin.videos.create') }}">New Featured Video</a>
			</li>
			@foreach($videos as $video)
				<li>
					<a href="{{ route('admin.videos.edit', $video->id) }}"> {{ $video->artist }} - {{ $video->song }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop