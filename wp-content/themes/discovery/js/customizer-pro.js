( function( $ ) {

	// Add Discovery Pro message
	upgrade = $('<a class="discovery-customize-plus"></a>')
		.attr('href', 'http://www.templateexpress.com/discovery-pro-theme')
		.attr('target', '_blank')
		.text(pro_object.pro_message);
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.discovery-customize-plus').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );