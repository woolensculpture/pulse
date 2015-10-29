@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
        <div class="header">Album Reviews
            <a class="header_button button" href="{{ route('admin.reviews.create') }}">New Review</a>
        </div>
		<ul>
			@foreach($reviews as $review)
				<li>
					<a href="{{ route('admin.reviews.edit', $review->id) }}"> {{ $review->band_name }} - {{ $review->album_name }} </a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
