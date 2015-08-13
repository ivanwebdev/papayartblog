<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<div class="page-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-content">
                <div class="page_heading_wrapper">
                    <div class="page_heading">
                        <div class="grid_14 alpha"><h1 class="page_title single-heading">
                                <?php if (is_day()) : ?>
                                    <?php printf(DAILY_ARCHIVES, get_the_date()); ?>
                                <?php elseif (is_month()) : ?>
                                    <?php printf(MONTHLY_ARCHIVES, get_the_date('F Y')); ?>
                                <?php elseif (is_year()) : ?>
                                    <?php printf(YEARLY_ARCHIVES, get_the_date('Y')); ?>
                                <?php else : ?>
                                    <?php echo BLOG_ARCHIVES; ?>
                                <?php endif; ?>
                            </h1></div>
                        <div class="grid_10 omega"><?php harrington_breadcrumbs(); ?></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_17 alpha">
                    <div class="content-bar">
                        <?php if (have_posts()): ?>

                            <?php
                            /* Since we called the_post() above, we need to
                             * rewind the loop back to the beginning that way
                             * we can run the loop properly, in full.
                             */
                            rewind_posts();
                            /* Run the loop for the archives page to output the posts.
                             * If you want to overload this in a child theme then include a file
                             * called loop-archives.php and that will be used instead.
                             */
                            get_template_part('loop', 'archive');
                            ?>
                            <div class="clear"></div>
                            <?php harrington_pagination(); ?> 
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