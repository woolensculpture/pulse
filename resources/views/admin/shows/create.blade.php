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
					{!! Form::submit('Save Show') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop