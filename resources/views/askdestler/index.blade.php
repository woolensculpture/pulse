@extends('layouts.master')

@section('content')

	<style>
        #bkgd {
            width: 909px;
            height: 171px;
            margin: 0 auto;
			background-image: url('{{ secure_asset('img/destler/bkgd.png') }}');
			padding-top: 538px;
        }
		
		#form {
			width: 410px;
			height: 180px;
			border: 0px solid black;
			margin-top: -365px;
			margin-left: 401px;
			padding: 20px;
		}
		
		#input {
			width: 390px;
		}
		
		#submit {
			margin-left: 0px;
			margin-top: 10px;
		}

		.destler-text {
			margin-top: 20px;
			font-size: 30pt;
		}
    </style>


	<div id="bkgd">
        <div id="form">
	        @include('shared.validation-messages')
	        {!! Form::open(['route' => 'askdestler.submit', 'id' => 'destler_form']) !!}
				<div>
					{!! Form::textarea('question', null, ['placeholder' => 'Type your question here!', 'id' => 'input']) !!}
				</div>
				<div>
					{!! Form::submit('Submit') !!}
				</div>
				<div class="destler-text">
					{{ $destlerText->value }}
				</div>
			{!! Form::close() !!}
        </div>
    </div>
    
@endsection