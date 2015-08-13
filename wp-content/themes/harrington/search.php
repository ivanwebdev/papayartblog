<?php
/**
 * The template for displaying Category pages.
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
                        <div class="grid_14 alpha"><h1><?php printf(SEARCH_RESULT, '' . get_search_query() . ''); ?></h1></div>
                        <div class="grid_10 omega"><?php harrington_breadcrumbs(); ?></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_17 alpha">
                    <div class="content-bar">
                        <?php if (have_posts()) : ?>               
                            <!--Start Post-->
                            <?php get_template_part('loop', 'search'); ?>
                            <!--End Post-->
                        <?php else : ?>
                            <article id="post-0" class="no-results not-found">
                                <header class="entry-header">
                                    <h1 class="entry-title">
                                        <?php echo NOTHING_FOUND; ?>
                                    </h1>
                                </header>
                                <!-- .entry-header -->
                                <div class="entry-content">
                                    <p>
                                        <?php echo NOTHING_MATCHED; ?>
                                    </p>
                                    <?php get_search_form(); ?>
                                </div>
                                <!-- .entry-content -->
                            </article>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <?php inkthemes_pagination(); ?> 
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