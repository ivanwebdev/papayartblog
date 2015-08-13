<?php

/**

 * This template generates links to social media icons once set in the theme options.  

 *

 * @package discovery

 */
?>
	<ul class="social-media">
		<?php if ( get_theme_mod( 'twitter' ) ) : ?>
			<li><a class="nav-social-btn twitter-icon" title="Twitter" href="<?php echo esc_url( get_theme_mod( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'facebook' ) ) : ?>
			<li><a class="nav-social-btn facebook-icon" title="Facebook" href="<?php echo esc_url( get_theme_mod( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'googleplus' ) ) : ?>
			<li><a class="nav-social-btn google-icon" title="Google+" href="<?php echo esc_url( get_theme_mod( 'googleplus' ) ); ?>" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
		<?php endif; ?>
		
	</ul><!-- #social-icons-->