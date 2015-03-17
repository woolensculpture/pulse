@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit User</h2>
			{!! Form::model($user,['method' => 'put', 'route' => ['admin.users.update', $user->id], 'file' => true]) !!}
				<br>
				<div>
          {!! Form::label('name', 'Name:') !!}
          {!! Form::text('name') !!}
        </div>
        <div>
          {!! Form::label('dj_name', 'DJ Name:') !!}
          {!! Form::text('dj_name') !!}
        </div>
        <div>
          {!! Form::label('email', 'Email Address:') !!}
          {!! Form::text('email') !!}
        </div>
        <div>
          {!! Form::label('picture', 'Picture: (Note: Pictures should be of size 175x175)') !!}
          {!! Form::file('picture') !!}
        </div>
				<div>
        <table>
				<tr>
          <td>{!! Form::submit('Update User') !!}
              {!! Form::close() !!} </td>

          <td>{!! Form::open(['method' => 'delete', 'route' => ['admin.users.delete', $user->id]]) !!}
              {!! Form::submit('Delete User') !!}
              {!! Form::close() !!} </td>
        </tr>
        </table>
				</div>
	</div>
</div>
@stop