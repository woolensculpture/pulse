@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
        <div class="header">Featured Videos
            <a class="header_button button" href="{{ route('admin.videos.create') }}">New Video</a>
        </div>
		<ul>
			@foreach($videos as $video)
				<li>
					<a href="{{ route('admin.videos.edit', $video->id) }}"> {{ $video->artist }} - {{ $video->song }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
