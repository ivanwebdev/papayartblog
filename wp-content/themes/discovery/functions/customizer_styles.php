<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function discovery_customizer_css() {
$styleOption = get_theme_mod( 'discovery_color_scheme');

	if( $styleOption != 'none'):
?>
		
	<link rel="stylesheet" class="test" href="<?php echo get_template_directory_uri();?>/css/<?php echo esc_attr(strtolower( get_theme_mod( 'discovery_color_scheme', 'turquoise' ) ) ); ?>.css" type="text/css" media="screen">
<?php
	endif;
}
add_action( 'wp_head', 'discovery_customizer_css' );