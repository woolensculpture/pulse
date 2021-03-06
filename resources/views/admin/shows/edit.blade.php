@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">

		<h2>Edit Show</h2>
		@include('shared.validation-messages')

		{!! Form::model($show,['method' => 'put', 'route' => ['admin.shows.update', $show->id], 'files' => true]) !!}
			<br>
			<div>
				{!! Form::label('name', 'Show Name:') !!}
				{!! Form::text('name') !!}
			</div>
			<div>
				{!! Form::label('description', 'Show Description:') !!}
				{!! Form::textarea('description') !!}
			</div>
			<div>
				{!! Form::label('show_picture', 'Show Picture: (Note: Pictures should be of size 150x150)') !!}
				{!! Form::file('show_picture') !!}
			</div>
			<div>
				{!! Form::label('slider-input', 'Slider Picture: (Note: Pictures should be of size 670x344') !!}
				{!! Form::file('slider_picture', [ 'id' => 'slider-input' ]) !!}
			</div>
			<div>
				<div>
					{!! Form::label('style', 'Styles:') !!}
					{!! Form::textarea('style', $show->style, [ 'id' => 'style-input' ]) !!}
				</div>
				<div style="position: relative; height: 344px; margin-bottom: 10px">
					<div id="style-display" class="message" style="{{ $show->style }}">Tomorrow 11 - 12 AM</span></div>
					<div>
						@if($show->slider_picture != null)
							<img id="slider-image" class="newsimg border" src="{{ secure_asset('img/slider/' . $show->slider_picture) }}">
						@else
							<img id="slider-image" class="newsimg border" src="#">
						@endif
					</div>
				</div>
			</div>
			{!! Form::submit('Update Show') !!}
		{!! Form::close() !!} </td>
		
		{!! Form::open(['method' => 'delete', 'route' => ['admin.shows.delete', $show->id], 'class' => 'delete-form']) !!}
			{!! Form::submit('Delete Show') !!}
		{!! Form::close() !!} </td>
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="{{ secure_asset('js/slider-style.js') }}"></script>
<script type="text/javascript">

	$(function() {
		SliderStyle.init();
	});

</script>

@stop