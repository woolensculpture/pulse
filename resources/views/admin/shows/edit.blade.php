@extends('layouts.master')

@section('content')
<div class="general_wrap border">
	<div class="admin_section">
		<h2>Edit Album Review</h2>
			{!! Form::model($show,['method' => 'put', 'route' => ['admin.shows.update', $show->id], 'file' => true]) !!}
        <br>
        <div>
          {!! Form::label('name', 'Show Name:') !!}
          {!! Form::text('name') !!}
        </div>
        <div>
          {!! Form::label('description', 'Show Description:') !!}
          {!! Form::textarea('description') !!}
        </div>
        <div>
          {!! Form::label('show_picture', 'Show Picture: (Note: Pictures should be of size 150x150)') !!}
          {!! Form::file('show_picture') !!}
        </div>
        <div>
          {!! Form::label('review', 'Slider Picture: (Note: Pictures shoule be of size 670x344') !!}
          {!! Form::file('slider_picture') !!}
        </div>
				<div>
        <table>
				<tr>
          <td>{!! Form::submit('Update Show') !!}
              {!! Form::close() !!} </td>

          <td>{!! Form::open(['method' => 'delete', 'route' => ['admin.shows.delete', $show->id]]) !!}
              {!! Form::submit('Delete Show') !!}
              {!! Form::close() !!} </td>
        </tr>
        </table>
				</div>
	</div>
</div>
@stop