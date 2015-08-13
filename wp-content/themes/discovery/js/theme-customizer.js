/**

 * Theme Customizer enhancements for a better user experience.

 *

 * Contains handlers to make Theme Customizer preview reload changes asynchronously.

 */



( function( $ ) {

	wp.customize( 'blogname', function( value ) {

		value.bind( function( to ) {

			$( '.site-title a' ).html( to );

		} );

	} );

	wp.customize( 'blogdescription', function( value ) {

		value.bind( function( to ) {

			$( '.site-description' ).html( to );

		} );

	} );


	wp.customize( 'blogdescription', function( value ) {

		value.bind( function( to ) {

			$( '.site-description' ).html( to );

		} );

	} );


	wp.customize( 'telnumber_textbox_header_one', function( value ) {

		value.bind( function( to ) {

			$( '.contact.telnumber' ).html( to );

		} );

	} );

	wp.customize( 'mobile_textbox_header_one', function( value ) {

		value.bind( function( to ) {

			$( '.contact.mobile' ).html( to );

		} );

	} );

	wp.customize( 'email_textbox_header_one', function( value ) {

		value.bind( function( to ) {

			$( '.contact.email' ).html( to );

		} );

	} );

	wp.customize( 'address_textbox_header_one', function( value ) {

		value.bind( function( to ) {

			$( '.contact.address' ).html( to );

		} );

	} );

	wp.customize( 'copyright_text', function( value ) {

		value.bind( function( to ) {

			$( '.site-info p' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox', function( value ) {

		value.bind( function( to ) {

			$( '.featuretext_left h2' ).html( to );

		} );

	} );

	wp.customize( 'featured_button_txt', function( value ) {

		value.bind( function( to ) {

			$( '.featuretext_right a' ).html( to );

		} );

	} );

	wp.customize( 'homepage_service_title', function( value ) {

		value.bind( function( to ) {

			$( '.featuretext_middle h3' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox_header_one', function( value ) {

		value.bind( function( to ) {

			$( '.box-1 .featuretext h4 a' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox_header_two', function( value ) {

		value.bind( function( to ) {

			$( '.box-2 .featuretext h4 a' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox_header_three', function( value ) {

		value.bind( function( to ) {

			$( '.box-3 .featuretext h4 a' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox_text_one', function( value ) {

		value.bind( function( to ) {

			$( '.box-1 .featuretext p' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox_text_two', function( value ) {

		value.bind( function( to ) {

			$( '.box-2 .featuretext p' ).html( to );

		} );

	} );

	wp.customize( 'featured_textbox_text_three', function( value ) {

		value.bind( function( to ) {

			$( '.box-3 .featuretext p' ).html( to );

		} );

	} );

	wp.customize( 'homepage_recent_title', function( value ) {

		value.bind( function( to ) {

			$( '.section_thumbnails h3' ).html( to );

		} );

	} );

	wp.customize( 'homepage_partners_title', function( value ) {

		value.bind( function( to ) {

			$( '.client h3' ).html( to );

		} );

	} );

} )( jQuery );