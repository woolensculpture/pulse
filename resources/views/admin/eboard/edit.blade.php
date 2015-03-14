@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit Eboard Position</h2>
			{!! Form::model($eboard,['method' => 'put', 'route' => ['admin.eboard.update', $eboard->id]]) !!}
				<br>
				<div>
  					{!! Form::label('position', 'Position:') !!}
  					{!! Form::text('position') !!}
  				</div>

		  		<div>
  					{!! Form::label('name', 'Name:') !!}
  					{!! Form::text('name') !!}
  				</div>
  				<div>
  					{!! Form::label('email', 'Email:') !!}
  					{!! Form::text('email') !!}
  				</div>
  				<div>
  					{!! Form::label('hours', 'Hours:') !!}
  					{!! Form::text('hours') !!}
				</div>
				<div>
          <table>
					<tr>
            <td>{!! Form::submit('Update Position') !!}
                {!! Form::close() !!} </td>

            <td>{!! Form::open(['method' => 'delete', 'route' => ['admin.eboard.delete', $eboard->id]]) !!}
                {!! Form::submit('Delete Position') !!}
                {!! Form::close() !!} </td>
          </tr>
          </table>
				</div>
	</div>
</div>
@stop