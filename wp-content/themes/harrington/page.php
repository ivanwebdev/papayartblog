<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 */
?>
<?php get_header(); ?>
<div class="page-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-content">
                <div class="page_heading_wrapper">
                    <div class="page_heading">
                        <div class="grid_12 alpha"><h1><?php the_title(); ?></h1></div>
                        <div class="grid_12 omega"><?php harrington_breadcrumbs(); ?></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_17 alpha">
                    <div class="content-bar">
                        <?php if (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>	
                        <?php endif; ?>	
                    </div>
                </div>
                <div class="grid_7 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>