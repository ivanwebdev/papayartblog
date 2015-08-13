<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
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
                        <div class="grid_14 alpha"><h1><?php printf(TAG_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1></div>
                        <div class="grid_10 omega"><?php harrington_breadcrumbs(); ?></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_17 alpha">
                    <div class="content-bar">   
                        <!--Start Post-->
                        <?php get_template_part('loop', 'index'); ?> 
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php next_posts_link(NEWER_POSTS); ?>
                            </span> <span class="nav-next">
                                <?php previous_posts_link(OLDER_POSTS); ?>
                            </span> </nav>	
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