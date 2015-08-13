<?php
	
	/*
	 * Header contact Details
	 */	

	$list_contact_options = array(
		'telnumber'			=> __( 'Telephone Number', 'discovery'),
		'mobile'			=> __( 'Mobile Number', 'discovery'),
		'email'				=> __( 'Email Address', 'discovery'),
		'address'			=> __( 'Address', 'discovery'),
	);

	echo "<div class='topbar_content_left'>";

	foreach( $list_contact_options as $key => $value){
		if( get_theme_mod( $key . '_textbox_header_one' ) ){
			echo '<div class="contact">' . get_theme_mod( $key . '_textbox_header_one' ) . '</div>';
		}
	}

	echo "</div>";


	
