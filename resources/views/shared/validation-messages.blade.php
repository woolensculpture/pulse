@if (count($errors) != 0)
	<div class="validation-messages">
		@foreach ($errors->all() as $error)
			<div class="error-message">
				{{ $error }}
			</div>
		@endforeach
	</div>
@endif