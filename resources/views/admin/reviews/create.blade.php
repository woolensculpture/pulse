@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New Album Review</h2>
		@include('shared.validation-messages')
			{!! Form::open(array('route' => 'admin.reviews.create.save', 'files' => true)) !!}
				<br>
				<div>
					{!! Form::label('band_name', 'Band Name:') !!}
					{!! Form::text('band_name') !!}
  				</div>
	  			<div>
					{!! Form::label('album_name', 'Album Name:') !!}
          			{!! Form::text('album_name') !!}
				</div>
				<div>
					{!! Form::label('img_name', 'Album Image: (Note: Pictures should be of size 310x310)') !!}
					{!! Form::file('img_name') !!}
				</div>
				<br>
				<div>
					{!! Form::label('review', 'Album Review:') !!}
					{!! Form::textarea('review') !!}
				</div>
				<div>
					{!! Form::submit('Save Review') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(function() {
  var $form = $('form');
  $form.on('submit', validate); 
  
	function validate(e) {
		$('.error-message').remove();
		var $input = $('input[type=file]');
		if ($input.val().length == 0) {
	    	e.preventDefault();
	    	$input.after('<div class="error-message">File Input Required</div>');
	   }
	 }
});
</script>
@stop