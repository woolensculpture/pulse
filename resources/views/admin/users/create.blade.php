@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Add New User</h2>
			{!! Form::open(array('route' => 'admin.users.create.save', 'files' => true)) !!}
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
					{!! Form::label('password', 'Password:') !!}
					{!! Form::text('password') !!}
				</div>
				<div>
					{!! Form::label('dj_user', 'DJ Name:') !!}
					{!! Form::text('dj_user') !!}
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
		        <br>
		        <div>
					{!! Form::label('picture', 'Picture: (Note: Pictures should be of size 175x175)') !!}
    				{!! Form::file('picture') !!}
		        </div>
				<div>
					{!! Form::submit('Save User') !!}
				</div>
	</div>
		{!! Form::close() !!}
</div>
@stop