(function($) {
	$.extend($.fn,{
		show:function(options){
			if(!this.length){
				options && options.debug && window.console && console.warn("nothing selected, can't validate, returning nothing");
				return;
			}
			// check if a validator for this form was already created
			var validator = $.data(this[0], 'validator');
			if (validator) {
				return validator;
			}

			validator = new $.validator(options, this[0]);
			$.data(this[0], 'validator', validator);
		}
	})
})(jQuery);