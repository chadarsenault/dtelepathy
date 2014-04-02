;(function() {
	"use strict";

	function fail(input) {
		var iid = input.target.id;
		jQuery('#'+iid+' .email-input').val('').prop({'placeholder':'Oops! Try again!'});
	}

	jQuery('#email-form,#email-form2').on('submit', function(e) {
		var formData = jQuery(this).serialize();
		jQuery.ajax({
			url: "/php/ajax/email.php",
			type: "POST",
			data: formData,
			cache: false,
			async: true,
		}).success(function(data) {
			if(data==="success") {
				jQuery('#email-form,#email-form2').empty().append(
					jQuery('<h2>').addClass('center').text('Thank you for subscribing to Twine!')
				);
			} else {
				fail(e);
			}
		}).fail(function() {
			fail(e);
		});
		return false;
	});
}());