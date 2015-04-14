@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New Featured Video</h2>
		@include('shared.validation-messages')
		{!! Form::open(array('route' => 'admin.videos.create.save')) !!}
			<br>
			<div>
				{!! Form::label('artist', 'Artist:') !!}
				{!! Form::text('artist') !!}
			</div>
  			<div>
				{!! Form::label('album', 'Album:') !!}
      			{!! Form::text('album') !!}
			</div>
			<div>
				{!! Form::label('song', 'Song:') !!}
				{!! Form::text('song') !!}
			</div>
			<div>
				{!! Form::label('url_tag', 'URL Link Copy:') !!}
				{!! Form::text('url_tag') !!}
			</div>
			<div>
				{!! Form::label('review', 'Video Review:') !!}
				{!! Form::textarea('review') !!}
			</div>
			<div>
				{!! Form::submit('Save Review') !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop