@extends('layouts.master')

@section('content')
<div id="eboard_update_form" class="border general_wrap">
	<a class="admin_button button" href="/admin">Admin Screen</a>
	<h1>Executive Board</h1>

	<table class="eboard_form_table" cellspacing="0">
		<tr>
	    	<td>Position</td>
	        <td>Name</td>
	        <td>Email</td>
	        <td>Hours</td>
	        <td></td>
	    </tr>	

	@foreach($eboard as $row)
		<tr>		
			<td> {{ $row->position }} </td>
			<td> {{ $row->name }} </td>
			<td> {{ $row->email }} </td>
			<td> {{ $row->hours }} </td>
			<td><a class="admin_button button" href=" {{ route('admin.eboard.edit', $row->id) }} ">Edit Position</a></td>
		</tr>
	@endforeach
	</table>
	<a class="button" style="width:70px; font-size:16px" href="{{ route('admin.eboard.create') }}">New Position</a>
	<br>
</div>
@stop
