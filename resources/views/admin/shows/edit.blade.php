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
        {!! Form::file('slider_picture', [ 'id' => 'slider-input' ]) !!}
      </div>
      <div>
        <div>
          {!! Form::label('style', 'Styles:') !!}
          {!! Form::textarea('style', $show->style, [ 'id' => 'style-input' ]) !!}
        </div>
        <div style="position: relative; height: 344px; margin-bottom: 10px">
          <div id="style-display" class="message" style="{{ $show->style }}">Tomorrow 11 - 12 AM</span></div>
          <div style="position: absolute;">
            @if($show->slider_picture != null)
              <img id="slider-image" class="newsimg border" src="{{ secure_asset('img/slider/' . $show->slider_picture) }}">
            @else
              <img id="slider-image" class="newsimg border" src="#">
            @endif
          </div>
        </div>
      </div>
			<div>
        <table>
				<tr>
          <td>{!! Form::submit('Update Show') !!}
              {!! Form::close() !!} </td>

          <td>{!! Form::open(['method' => 'delete', 'route' => ['admin.shows.delete', $show->id]]) !!}
              {!! Form::submit('Delete Show') !!}
              {!! Form::close() !!} </td>

          <td></td>
        </tr>
        </table>
			</div>
	</div>
</div>
@stop

@section('scripts')

<script type="text/javascript">

var SliderEdit = (function($, undefined) {

  var components = {
    init: function() {
      this.cacheElements();
      this.buildComponents();
      this.bindEvents();
    },

    cacheElements: function () {
      this.$styleDisplay = $('#style-display');
      this.$styleInput = $('#style-input');
      this.$image = $('#slider-image');
      this.$sliderInput = $('#slider-input');
    },

    buildComponents: function () {
      this.reader = new FileReader();
    },

    bindEvents: function () {
      this.$styleInput.on('keyup', _updateStyle);
      this.reader.onload = _loadImage;
      this.$sliderInput.on('change', _readURL);
    }
  };

  function _loadImage(e) {
    components.$image.attr('src', e.target.result);
  }

  function _readURL() {
    if (this.files && this.files[0]) {
      components.reader.readAsDataURL(this.files[0]);
    }
  }

  function _updateStyle() {
    components.$styleDisplay.attr('style', components.$styleInput.val());
  }

  function init() {
    components.init();
  }

  return {
    init: init
  }
  
})(jQuery);

SliderEdit.init();

</script>

@stop