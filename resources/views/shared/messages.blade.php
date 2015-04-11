@if (Session::has('success'))
    <div class="noty-message" data-type="success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="noty-message" data-type="error">
        {{ Session::get('error') }}
    </div>
@endif