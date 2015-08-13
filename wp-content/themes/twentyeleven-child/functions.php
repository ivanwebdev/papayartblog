<?php

// In child themes the functions.php is applied before the parent
// theme's functions.php. So we need to wait for the parent theme to add
// it's filter before we can remove it.
add_action( 'after_setup_theme', 'my_child_theme_setup' );

function my_child_theme_setup() {
	// Removes the filter that adds the "singular" class to the body element
	// which centers the content and does not allow for a sidebar
	remove_filter( 'body_class', 'twentyeleven_body_classes' );
}


/**
 * Register widgetized areas
 */
function child_widgets_init() {
	// Area 3, located in the header. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Header Widget Area', 'child' ),
		'id' => 'first-header-widget-area',
		'description' => __( 'The first header widget area', 'child' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


		// Area 4, located in the header. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Header Widget Area', 'child' ),
		'id' => 'second-header-widget-area',
		'description' => __( 'The second header widget area', 'child' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	// Area 5, located in the header. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Header Widget Area', 'child' ),
		'id' => 'third-header-widget-area',
		'description' => __( 'The thirdt header widget area', 'child' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the header. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Header Widget Area', 'child' ),
		'id' => 'fourth-header-widget-area',
		'description' => __( 'The fourth header widget area', 'child' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


}
/** Register sidebars by running child_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'child_widgets_init' );


?>