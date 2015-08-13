<?php
/**
 * Single Page WordPress file
 *
 * This file is the Singe Page template file, which is output a single post
 * 
 *
 * @package		blogBox WordPress Theme
 * @copyright	Copyright (C) 2015, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
global $blogBox_options;
get_header(); 

if( $blogBox_options['bB_use_fullwidth_single_post'] == 1 ) {
	echo '<div id="fullwidth">';
		echo '<div id="fullwidth_blog">';
		echo '<br/>';
} else {
	echo '<div id="widecolumn">';
} ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php blogBox_post_format(); ?>
		</div>
		<?php comments_template('', true); ?>
		<?php endwhile; ?>
			<div class="postpagenav">
			<?php if (is_attachment()) { ?>
				<div class="left"><?php next_image_link('','&#60;&#60; View previous'); ?></div>
				<div class="right"><?php previous_image_link('','View next &#62;&#62;'); ?></div>
			<?php } else { ?>
				<?php next_post_link('<div class="right">%link &#62;&#62;</div>'); ?> 
				<?php previous_post_link('<div class="left">&#60;&#60; %link</div>'); ?> 
			<?php } ?>
			<br/>
			</div>
	<?php else : ?>
		<!-- Couldn't find the post -->
		<div class="nosearch">
			<h2><?php esc_html_e('Sorry about that - we couldn\'t find the post. Da link is not Da link!','blogBox'); ?></h2>
			<p><?php esc_html_e('Don\'t know why, but contact us and we\'ll look into it.','blogBox'); ?></p>
			<h2><?php esc_html_e('Something to read?','blogBox'); ?></h2>
			<p><?php esc_html_e('Want to read something else? These are the latest posts:','blogBox'); ?><br/><br/></p>
			<ul><?php wp_get_archives('type=postbypost&limit=20&format=html'); ?></ul>
		</div>
	<?php endif; ?>
	<br/>
<?php if( $blogBox_options['bB_use_fullwidth_single_post'] == 1 ) {
		echo '</div>';
	echo '</div>';
} else {
	echo '</div>';
	get_sidebar();
}
get_footer(); 
?>