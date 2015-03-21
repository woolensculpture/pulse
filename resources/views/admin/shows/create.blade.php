@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New Show</h2>
		{!! Form::open(array('route' => 'admin.shows.create.save', 'files' => true)) !!}
			<br>
			<div>
				{!! Form::label('name', 'Show Name:') !!}
				{!! Form::text('band_name') !!}
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
				{!! Form::label('review', 'Slider Picture: (Note: Pictures shoule be of size 670x344') !!}
				{!! Form::file('slider_picture') !!}
			</div>
			<div>
				<div>
				  {!! Form::label('style', 'Styles:') !!}
				  {!! Form::textarea('style', $show->style, [ 'id' => 'style-input' ]) !!}
				</div>
				<div style="position: relative; height: 344px; margin-bottom: 10px">
					<div id="style-display" class="message" style="{{ $show->style }}">Tomorrow 11 - 12 AM</span></div>
					<div style="position: absolute;">
						@if($show->slider_picture != null)
							<img id="slider-image" class="newsimg border" src="{{ secure_asset('img/slider/' . $show->slider_picture) }}">
						@else
							<img id="slider-image" class="newsimg border" src="#">
						@endif
					</div>
				</div>
		  	</div>
			<div>
				{!! Form::submit('Save Show') !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="{{ secure_asset('js/slider-style.js') }}"></script>
<script type="text/javascript">

	$(function() {
		SliderStyle.init();

		var $form = $('form');
		$form.on('submit', validate); 
	  
		function validate(e) {
			$('.error-message').remove();
			var $input = $('input[type=file]');
			$input.each(function() {
				if ($(this).val().length == 0) {
					e.preventDefault();
					$(this).after('<div class="error-message">File Input Required</div>');
				}
			});
	    }
	});

</script>
@stop