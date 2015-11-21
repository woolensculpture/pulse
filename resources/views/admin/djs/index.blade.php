@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section" >
        <div class="header">DJs
            <a class="header_button button" href="{{ route('admin.djs.create') }}">New DJ</a>
        </div>
		<ul>
			@foreach($djs as $dj)
				<li>
					<a href="{{ route('admin.djs.edit', $dj->id) }}">{{ $dj->realname }} : {{ $dj->name }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
