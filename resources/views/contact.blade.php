@extends('layouts.master')

@section('content')
	<div id="contact" class="border general_wrap">
			<div class="header">Contacts</div>
			<hr class="white">
		
			<div id="contact_items">
			    <img class="border" src="{{ secure_asset('img/contact/eboard.png') }}" alt="Executive Board" />
			    <img id="center_contact" class="border" src="{{ secure_asset('img/contact/home.png') }}" alt="WITR Radio 32 Lomb Memorial Drive Rochester, NY 14623-0563" />
			    <img class="border" src="{{ secure_asset('img/contact/request.png') }}" alt="Request Line: (585)475-2271 Office Line: (585) 475-2000" />
			</div>
			<div id="divider">
			    <img src="{{ secure_asset('img/contact/divider.png') }}" alt="" id="divider_img" />
			</div>
			<div id="eboard_wrap" class="border">
			    <ul id="eboard" class="border">
					@foreach($eboard as $row)
					<li id="eboard_member">
				    	<div class="position">{{ $row->position }}</div>
				    	<ul class="eboard_info">
				    	    <li class="eboard_name">{{ $row->name }}</li>
				    	    <li class="eboard_email">{{ $row->email }}</li>
				    	    <li class="eboard_hours">{{ $row->hours }}</li>
				    	</ul>
	    			    <div style="clear:both"/>
					</li>
				    <div style="clear:both"/>
					@endforeach
			    </ul>
			</div>
		</div>
@stop