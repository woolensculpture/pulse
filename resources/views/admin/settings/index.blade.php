@extends('layouts.master')

@section('content')
<style>
	.system-settings input[type=text] {
		width: 95%;
	}
</style>

	<div class="system-settings general_wrap border" >
		{!! Form::open(['route' => 'admin.settings.update', 'method' => 'PUT']) !!}
			@foreach ($settings as $setting)
				{!! Form::label('value_' . $setting->id, $setting->label) !!}
				{!! Form::text('value_' . $setting->id, $setting->value) !!}
			@endforeach
			<div>
				{!! Form::submit('Submit') !!}
			</div>
		{!! Form::close() !!}
	</div>
@stop
