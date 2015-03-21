var SliderStyle = (function($, undefined) {

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
  };
  
})(jQuery);
