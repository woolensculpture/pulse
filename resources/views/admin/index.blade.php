@extends('layouts.master')

@section('content')
<div class="border general_wrap">
	<div class="admin_section">
	    <h2>Admin</h2>
	    <ul>
	        <li><a href="{{ route('admin.eboard.index') }}">Change Eboard</a></li>
	        <li><a href="{{ route('admin.settings') }}">System Settings</a></li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Shows &amp; Schedule</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.schedule') }}">Edit Schedule</a>
	        </li>
	        <li>
	            <a href="{{ route('admin.shows.index') }}">Add/Edit Shows</a>
	        </li>
	        <li>
	            <a href="{{ route('admin.djs.index') }}">Add/Edit DJs</a>
	        </li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Events</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.events.index') }}">Promote Events to Front Page</a>
	        </li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Users</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.users.index') }}">Add/Edit Users</a>
	        </li>
	    </ul>
	</div>
	<div class="admin_section">
	    <h2>Content</h2>
	    <ul>
	        <li>
	            <a href="{{ route('admin.reviews.index') }}">Album Reviews</a>
	        </li>
			<li>
			    <a href="{{ route('admin.videos.index') }}">Featured Video</a>
			</li>
	    </ul>
	</div>
</div>
@stop