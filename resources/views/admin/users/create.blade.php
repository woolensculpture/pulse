@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New User</h2>
		@include('shared.validation-messages')
			{!! Form::open(array('route' => 'admin.users.create.save')) !!}
				<br>
				<div>
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name') !!}
  				</div>
	  			<div>
					{!! Form::label('email', 'Email Address:') !!}
          			{!! Form::text('email') !!}
				</div>
				<div>
		          <table>
		            <tr>
		              <td>{!! Form::label('user_role', 'User Role:') !!}</td>
		            </tr>
		            <tr>
		              <td>{!! Form::select('user_role', $roles) !!}</td>
		            </tr>
		          </table>
		        </div>
				<div>
					{!! Form::submit('Save User') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop