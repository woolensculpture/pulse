@extends('layouts.master')

@section('content')
<div class="border general_wrap">
	<div class="admin_section">
	    <h2>Admin</h2>
	    <ul>
	        <li><a href="{{ route('admin.eboard.eboard') }}">Change Eboard</a></li>
	        <li><a href="{{ route('admin.eboard.new_position') }}">Add New Position</a></li>
	        <li><a href="{{ route('admin.permissions.roles') }}">Role Administration</a></li>
			<li><a href="{{ route('admin.permissions.user_roles') }}">Assign User Roles</a></li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Shows &amp; Schedule</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.schedule') }}">Edit Schedule</a>
	        </li>
	        <li>
	            <a href="{{ route('admin.shows') }}">Add/Edit Shows</a>
	        </li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Events</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.slider') }}">Promote Events to Front Page</a>
	        </li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>DJs/Users</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.users') }}">Add/Edit DJs/Users</a>
	        </li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Content</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.reviews') }}">Album Reviews</a>
	        </li>
			<li>
			    <a href="{{ route('admin.video') }}">Featured Video</a>
			</li>
			<li>
			    <a href="{{ route('admin.contest.view_entries') }}">AFCU Contest Entries</a>
			<li>
	    </ul>
	</div>
</div>
@stop