@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="general_section">
		<div class="header">Welcome to the DJ Page!</div>
		<ul>
			<li>
				<a href="{{ route('dj.charts') }}">Weekly Charts</a>
			</li>
			<li>
				<a href="{{ route('dj.listeners', ['studio' => 'studio-x']) }}">Streaming Listeners: Studio X</a>
			</li>
			<li>
				<a href="{{ route('dj.listeners', ['studio' => 'studio-a']) }}">Streaming Listeners: Studio A</a>
			</li>
			<li>
				<a href="{{ route('dj.support') }}">Support Ticket</a>
			</li>
			<li>
				<a href="{{ route('dj.file', ['file' => 'bylaws.pdf']) }}">WITR Bylaws</a>
			</li>
			<li>
				<a href="{{ route('dj.file', ['file' => 'pandp.doc']) }}">Policies and Procedures</a>
			</li>
			<li>
				<a href="{{ url('wiki') }}">WITR Wiki</a>
		        <span style="margin-left: 10px; font-size: 10pt" class="clean_type">Username: wikiuser</span>
		        <span style="margin-left: 10px; font-size: 10pt" class="clean_type">Password: W1k189.7</span>
			</li>
			<li>
		        <a href="{{ app('config')['witr.hours_form'] }}">
			        Work Hours
		        </a>
			</li>
		</ul>
	</div>
</div>

@stop
