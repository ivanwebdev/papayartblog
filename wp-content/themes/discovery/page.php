<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package discovery
 * @since discovery 1.0
 */

get_header(); ?>
		<header class="entry-header">
		<h1 class="page-title"><?php the_title(); ?></h1><span class="breadcrumbs"><?php if (function_exists('discovery_breadcrumbs')) discovery_breadcrumbs(); ?></span>
		</header><!-- .entry-header -->
		<div id="primary_wrap">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>